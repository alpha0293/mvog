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
use Auth;
use App\User;
use App\Exports\UsersExport;
use App\Exports\DutuExportView;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if (Auth::user()->roleid!=1) {
			//return về một route khi người dùng không là admin
			return redirect()->route('home');
        }
        $iddt=Dutu::get()->where('idstatus','1');
		//get all dutu from zone...
		$izone=Dutu::get();

        try {
            //dd(($izone->first->getattend->getattend)->sortBy('month'));
        } catch (\Exception $e) {
            //dd('Error ' .$e->getMessage());
        }
        //dd($izone->first->getattend->getattend->all());
        $index=1;
        $index2=1;
        return view('admin.home',compact('iddt','izone','index','index2'));

		
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
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        $lstxetduyet = Dutu::all()->where('idstatus',2);
        $index = 1;
        return view('admin.dutu.xetduyet',compact('lstxetduyet','index'));
    }

    public function xetduyet(Request $request) //xét duyệt dự tu vào sinh hoạt
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
            if($request->value == 'true')
                $status = 1;
            else
            {
                $status = 2;
            }
            try {
                Dutu::where($request->id)->update(['idstatus' => $status]);
                return "Thanh cong";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function xetduyetall(Request $request) //xét duyệt all dự tu vào sinh hoạt
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
            try {
                Dutu::where('idstatus',2)->update(['idstatus' => 1]);
                return "Thanh cong";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function lstlenlop() //load danh sách
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        $index = 1;
        $lstlenlop = Dutu::all()->where('idstatus',1)->where('idyear','<>',4);
        return view('admin.dutu.lenlop',compact('lstlenlop','index'));
    }



    public function lenlop(Request $request) //len lop 1 dự tu
    {
        
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
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
    }
     public function lenlopall(Request $request)
    {
        return $request->all();
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
           $lstdutu = Dutu::where('idyear','<>',4)->get();
           foreach ($lstdutu as $dutu) {
                $dutu->idyear += 1;
           }
        }            
    }

    public function lstnhomtruong() //load danh sách Dự tu ra để set nhóm trưởng
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        $lstzone = Zone::all();
        $index = 1;
        $lstnhomtruong = Dutu::all()->where('idstatus',1);
        return view('admin.dutu.nhomtruong',compact('lstnhomtruong','index','lstzone'));
    }

    public function nhomtruong(Request $request) //Set nhom trưởng cho 1 dự tu
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
            if($request->value == 'true')
                $role = 2;
            else
            {
                $role = 3;
            }
            try {
                User::where('id',$request->id)->update(['roleid' => $role]);
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
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
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
    }
}
