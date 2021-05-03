<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Attendance;
use App\Role;
use App\Dutu;
use App\Zone;
use App\Year;
use Auth;
use App\User;
use App\Exports\UsersExport;
use App\Exports\DutuExportView;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UserChangePassword;
use Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iddt=Dutu::get()->where('idstatus','1');
		//get all dutu from zone...
		$izone=Dutu::get();
        $zone1 = Zone::all();
        $year = Year::all();
        $lstchoduyet = Dutu::all()->where('idstatus','<>',1);
        $truongnhom = User::whereRoleIs('nhomtruong');
        try {
            //dd(($izone->first->getattend->getattend)->sortBy('month'));
        } catch (\Exception $e) {
            //dd('Error ' .$e->getMessage());
        }
        //dd($izone->first->getattend->getattend->all());
        $index=1;
        $index2=1;
        return view('admin.home',compact('iddt','izone','index','index2','zone1','year','lstchoduyet','truongnhom'));

		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		dd('12122');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function gety()
    {
        $year = $_GET['year'];
        //return $p;
       // foreach (Attendance as $i => where) {
            # code...
        //}
        $lstdd = Attendance::all()->where('year',$year);
       // return $lstdd;
        //$lstdd[] = (array)$lstdd1;
        $lstdutu = Dutu::get()->where('idstatus',1);
       // return $lstdutu->count();
        //$lstdutu[] = (array)$lstdutu1;
        return array($lstdutu,$lstdd);
        //$total = array('' => , );
       // return $lstdd;
    }


    public function lstxetduyet() //Load ds xét duyệt
    {
        $lstxetduyet = Dutu::with('getuser')->where('idstatus',2)->where('check',0)->get();
        for ($i=0; $i < $lstxetduyet->count(); $i++) {
            if (!$lstxetduyet[$i]->getuser->email_verified_at) {
                $lstxetduyet->pull($i);
             } 
        }
        $index = 1;
        return view('admin.dutu.xetduyet',compact('lstxetduyet','index'));
    }

    public function xetduyet(Request $request) //xét duyệt dự tu vào sinh hoạt
    {
        // return $request->all();
        if($request->value == 'true')
            $status = 1;
        else
        {
            $status = 2;
        }
        try {
            Dutu::where('id',$request->id)->update(['idstatus' => $status]);
            return "Thanh cong";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function xetduyetall(Request $request) //xét duyệt all dự tu vào sinh hoạt
    {
        try {
            Dutu::where('idstatus',2)->where('check',0)->update(['idstatus' => 1]);
            return "Thanh cong";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function lstlenlop() //load danh sách
    {
        $index = 1;
        $lstlenlop = Dutu::all()->where('idstatus',1)->where('idyear','<>',4)->where('checklenlop',0);
        return view('admin.dutu.lenlop',compact('lstlenlop','index'));
    }



    public function lenlop(Request $request) //len lop 1 dự tu
    {
        $idyear = Dutu::findOrFail($request->id)->idyear;
        if($request->value == 'true')
            $year = $idyear + 1;
        else
        {
            $year = $idyear - 1;
        }
        try {
            Dutu::where('id',$request->id)->update(['idyear' => $year]);
            return 'Thanh cong';
        } catch (Exception $e) {
            return $e->getMessage();
        }          
    }
     public function lenlopall(Request $request)
    {
       $lstdutu = Dutu::where('idyear','<>',4)->get();
       foreach ($lstdutu as $dutu) {
            $dutu->idyear += 1;
       }           
    }

    public function lstnhomtruong() //load danh sách Dự tu ra để set nhóm trưởng
    {
        $lstzone = Zone::all();
        $index = 1;
        $lstnhomtruong = Dutu::with('getuser')->where('idstatus',1)->get();
        return view('admin.dutu.nhomtruong',compact('lstnhomtruong','index','lstzone'));
    }

    public function nhomtruong(Request $request) //Set nhom trưởng cho 1 dự tu
    {
        $user = User::findOrFail($request->id);
        if($request->value == 'true')
        {
            try {
            $user->attachRole('nhomtruong');
            $user->detachRole('dutu');
            return "Thanh cong";
            } catch (Exception $e) {
                return $e->getMessage();
            } 
        }
        else
        {
            try {
            $user->detachRole('nhomtruong');
            $user->attachRole('dutu');
            return "Thanh cong";
            } catch (Exception $e) {
                return $e->getMessage();
            } 
        }

    }

    public function export() //export EXCELL
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportview() //export EXCELL
    {
        return Excel::download(new DutuExportView, 'users-view.xlsx');
    }

    public function import()
    {
        return view('admin.import');
    }

    public function submitimport()
    {
        try {
            $import = Excel::import(new UsersImport, request()->file('user_file'));
            return 'Thanh công rồi mẹ ơi!!!';
        } catch (Exception $e) {
            return "Lỗi ".$e->getMessage();
        }
    }


    public function canhbao()
    {
        $lstdutu = Dutu::with('namezone','nameyear','namestatus','getattend','getdiem')->where('idstatus',1)->where('idyear','<>',4)->get();
        $lstdutu2 = collect([]);
        foreach ($lstdutu as $dutu) {
            $vang = 0;
            $diemtb = 0;
            $diemtb = $dutu->getdiem->avg('diem');
            foreach ($dutu->getattend as $attend) {
                if($attend->status == 0)
                    $vang++;
            }
            if ($dutu->getattend->count() != 0) {
                if($vang/$dutu->getattend->count() >= 1/3)
                {
                    $tongdiemdanh = $dutu->getattend->count();
                    // dd(gettype($dutu));
                    $dutu = collect($dutu);
                    try {
                        $dutu->put('vang',$vang);
                        $dutu->put('tongdiemdanh',$tongdiemdanh);
                        $dutu->put('diemtb',$diemtb);
                    } catch (Exception $e) {
                        dd($e->getMessage());
                    }
                    $lstdutu2->push($dutu);
                }
            }
            
        }
        // dd($lstdutu2);
        $lstdutu2 = (object) $lstdutu2;
        $index = 1;
        return view('admin.dutu.canhbao',compact('lstdutu2','index'));   
    }

    public function getChangePassword()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(UserChangePassword $request)
    {
        auth()->user()->update(['password' => bcrypt($request->new_password)]);
        return Redirect::back()->with('message','Đổi mật khẩu thành công!!!');
    }

    public function lsttuchoi() //load ds những người đã bị từ chối và có thể xét duyệt lại (status là 2 và check là 1)
    {
        $lstdutu = Dutu::all()->where('idstatus',2)->where('check',1);
        $index = 1;
        return view('admin.dutu.tuchoi',compact('lstdutu','index'));
    }
}
