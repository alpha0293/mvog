<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Dutu;
use App\Zone;
use App\Attendance;
use Auth;
use Redirect;
use Carbon\Carbon;
use Batch;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->year) {
            # code...
            $cur_year = $request->year;
        }
        else
        {
            if (date("m")<9) {
                $cur_year = (date("Y")-1). "-" .date("Y"); 
            }
            else{
                $cur_year = date("Y"). "-" .(date("Y")+1); 
            }
        }
        $index = 1;
        if (!Auth::user()->hasRole('superadministrator|administrator')) {
            //return về một route khi người dùng không là admin
            abort (403);
        }
        $lstdutu2 = collect([]);
        $iddt = Dutu::orderByRaw('name collate utf8mb4_vietnamese_ci')->where('idyear','<>',4)->where('idstatus','1')->with(['getattend' => function($query) use($cur_year){
            $query->where('year',$cur_year);
        }])->get();
        foreach ($iddt as $key => $value) {
            $getattend2 = (array)[1=>null, 2=>null, 3=>null, 4=>null, 5=>null, 6=>null, 7=>null, 8=>null, 9=>null, 10=>null,11=>null,12=>null];
            foreach ($value->getattend as $key => $value2) {
                //check tháng, nếu có tháng thì gán theo vị trí 9, 10, 11.....
                //nếu không có thì mặc định bản ghi đó null
                if ($value2->month >= 9) {
                    $month = $value2->month - 9;
                }
                else
                {
                    $month = $value2->month + 3;
                }
                $getattend2 = collect($getattend2);
                $getattend2->put($month+1,$value2);
            }
            $value = collect($value);
            $value->put('diemdanh',$getattend2);
            $lstdutu2->push($value);
        }
        $lstdutu2 = collect($lstdutu2);
        $izone = Attendance::get()->groupby('year');
        // return $izone;
        return view('admin.diemdanh.list_new',compact('index','lstdutu2','izone'));
        // return view('admin.diemdanh.list',compact('index','iddt','izone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // if(Auth::user()->roleid != 1 && Auth::user()->roleid != 2)
        // {
        //     abort(403,"Bạn không có quyền truy cập vào trang này!!!");
        // }
        $index = 1;
        // $roleid = Auth::user()->roleid; //lấy quyền của user vừa login
        $id = Auth::id(); //Lấy ID user vừa login
        $idzone = null;

        if(Auth::user()->hasRole('superadministrator|administrator'))
        {
            $dutu = Dutu::all()->where('idstatus','1');
        }
        else{
            $dutu = Dutu::all()->where('idstatus','1')->where('id',$id)->first();
            //dd($dutu->idzone); //bug nếu $dutu null
            if ($dutu != null) {
                $idzone = $dutu->idzone;
            }
            
        }
        
        //$lstdutu;
        //dd($idzone);
        if(Auth::user()->hasRole('superadministrator|administrator|nhomtruong'))
        {
            if(Auth::user()->hasRole('nhomtruong'))
            {
                if ($idzone != null) {
                    //dd('idzone !=');
                    // $lstdutu = Zone::findOrFail($idzone)->dutu->where('idstatus',1)->all();
                    $lstdutu = Dutu::orderByRaw('name collate utf8mb4_vietnamese_ci')->where('idstatus',1)->where('idzone',$idzone)->where('idyear',$request->yearsh)->get();
                    if ($lstdutu->count() == 0)
                    {
                        abort (404);
                    }
                    return view('user.attend',compact('lstdutu','index'));
                    //return view('user.attend')->with('lstdutu',$lstdutu,'index',$index);
                    # code...
                }
                else
                {
                    //dd('idzone null');
                    return redirect()->back();
                }
                
            }
            else
            {
                $lstdutu = Dutu::orderByRaw('name collate utf8mb4_vietnamese_ci')->where('idstatus','1')->whereNotin('idyear',4)->get();
                if ($lstdutu->count() == 0)
                {
                        abort (404);
                }
                return view('user.attend',compact('lstdutu','index'));
                //return view('user.attend')->with('lstdutu',$lstdutu,'index',$index);
            }
            //return 'admin';

        }
       return redirect()->route('home');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors_validate = collect([]);
        $errors_sql = collect([]);
        $data = json_decode($request->data, true);
        $value = $data[0];
        if ($value['month'] == 0) {
            return "Chọn tháng trước khi điểm danh";
        }
        $check = Attendance::all()->where('iddutu',$value['iddutu'])->where('month',$value['month'])->where('year',$value['year']);
        if ($check->count()){
            return "Nhóm dã điểm danh";
        }
        Attendance::insert($data);
        return 'thành công';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $yearsh = $request->yearsh;
        $zonesh = $request->zonesh;
        //
        // if(Auth::user()->roleid != 1 && Auth::user()->roleid != 2)
        // {
        //     abort(403,"Bạn không có quyền truy cập vào trang này!!!");
        // }
        $index = 1;
        $checktime = false;
        if(Auth::user()->hasRole('nhomtruong'))
        {
            $idzone = Dutu::findOrFail(Auth::user()->id)->idzone;
            $lstdutu = Dutu::orderByRaw('name collate utf8mb4_vietnamese_ci')->where('idstatus',1)->where('idzone',$idzone)->where('idyear',$yearsh)->with(['getattend' => function($query) use ( $month,$year ){
                $query->where('month',$month)->where('year',$year);
            }])->get(); //Constraining Eager Loads
            if($lstdutu->count() == 0)
            {
                abort (404);
            }
            if (count($lstdutu->first()->getattend) == 0) {
                abort (404);
            }
            $time = $lstdutu->first()->getattend->first()->created_at;
            $time2 = $time->addHours(setting('config.timediemdanhlai',''));
            // return $time2.' ht '.Carbon::now();
            if ($time2 < Carbon::now()) {
                $checktime = false;
            }
            else{
                $checktime = true;
            }
            return view('user.attend_show',compact('lstdutu','index','checktime'));
        }
        else
        {
            $lstdutu = Dutu::orderByRaw('name collate utf8mb4_vietnamese_ci')->where('idstatus',1)->where('idyear',$yearsh)->where('idzone',$zonesh)->with(['getattend' => function($query) use ( $month,$year ){
                $query->where('month',$month)->where('year',$year);
            }])->get(); //Constraining Eager Loads
            if ($lstdutu->count() == 0)
            {
                abort (404);
            }
            return view ('admin.diemdanh.show',compact('lstdutu','index','checktime'));
        }
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
        dd('edit AttendanceController');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data = json_decode($request->data, true);
        // return $data[0];
        $time = Carbon::parse($data[0]['created_at']);
        $time2 = $time->addHours(setting('config.timediemdanhlai',''));
        if ($time2 < Carbon::now()) {
            return "Đã hết thời gian điểm danh lại";
        }
        // return $data;
        // return $data;
        $value = $data;
        $userInstance = new Attendance;
        $index = 'id';
        try {
            Batch::update($userInstance, $value, $index);
            return "Cập nhật điểm danh thành công";
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        // if(Auth::user()->roleid!=1)
        // {
        //     return Redirect::back()->with('message','Bạn không có quyền thực hiện hành động này!!!');
        // }
        Attendance::where('id',$id)->delete();
        return Redirect::back();
    }
}
