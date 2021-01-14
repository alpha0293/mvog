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
        $zone1 = Zone::all();
        $year = Year::all();
        $lstchoduyet = Dutu::all()->where('idstatus','<>',1);
        $truongnhom = User::all()->where('roleid',2);
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


    public function lstxetduyet()
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
            $data = json_decode($request->data, true);
            foreach ($data as $dt)
            {
                try {
                    Dutu::where($dt['id']->update(['idstatus' => 1]));
                } catch (Exception $e) {
                    
                }
            }
        }
    }

    public function lstlenlop()
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        $index = 1;
        $lstlenlop = Dutu::all()->where('idstatus',1)->where('idyear','<>',4);
        return view('admin.dutu.lenlop',compact('lstlenlop','index'));
    }



    public function lenlop(Request $request)
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
            return $request->id;
            $data = json_decode($request->data, true);
            foreach ($data as $dt) {
                try {
                    $idyear = Dutu::findOrFail($dt['id'])->idyear;
                    Dutu::where($dt['id']->update(['idyear' => $idyear + 1]));
                } catch (Exception $e) {
                    
                }
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
            return $request->id;
            $data = json_decode($request->data, true);
            foreach ($data as $dt) {
                try {
                    $idyear = Dutu::findOrFail($dt['id'])->idyear;
                    Dutu::where($dt['id']->update(['idyear' => $idyear + 1]));
                } catch (Exception $e) {
                    
                }
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

    public function nhomtruong(Request $request)
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
            $data = json_decode($request->data, true);
            foreach ($data as $dt) {
                try {
                    // $idyear = Dutu::findOrFail($dt['id'])->idyear;
                    User::where($dt['id']->update(['roleid' => 2]));
                } catch (Exception $e) {
                    
                }
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
        // dd($lstdutu2);
        $lstdutu2 = (object) $lstdutu2;
        $index = 1;
        return view('admin.dutu.canhbao',compact('lstdutu2','index'));
        }   
    }
}
