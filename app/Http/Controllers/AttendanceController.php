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
            return redirect()->route('home');
        }
        $lstdutu2 = collect([]);
        $iddt = Dutu::get()->where('idyear','<>',4)->where('idstatus','1')->load(['getattend' => function($query) use($cur_year){
            $query->where('year',$cur_year);
        }])->sortby('name');
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
    public function create()
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
                    $lstdutu = Dutu::all()->where('idstatus',1)->where('idzone',$idzone);
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
                $lstdutu = Dutu::all()->where('idstatus','1');
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
        if(Auth::user()->hasRole('superadministrator|administrator|nhomtruong') )
        {
            foreach ($data as $dt) 
            {

                $dutu2 = Dutu::find($dt['iddutu']); //thử lấy dutu2 là ID được gửi từ bảng điểmm danh vào
                if(!$dutu2)
                {
                    continue;
                }

                if(Auth::user()->hasRole('nhomtruong'))
                {
                    $user = Dutu::findOrFail(Auth::id()); //Lấy Trưởng nhóm vừa đăng nhập
                    $y1 = $user->idzone; 
                    $y2 = $dutu2->idzone; //dutu 2 khac vùng sh thì không nhập dữ liệu vào bảng điểm danh
                    if ($y1 != $y2) {
                        continue;
                    }
                }
                $dt['month'] = $request->month;
                if ($dt['month'] == 0) {
                    return response()->json(['error' => 'Vui lòng chọn tháng/năm hợp lệ!!!'], 400);
                }
                $dt['year'] = $request->year;
                if(Attendance::validator($dt)->fails())
                {
                    // return "Validate Errors";không return errors mà đẩy vào 1 biến rồi show ra view
                    $errors_validate->push(Attendance::validator($dt)->errors());
                }
                else
                {
                    $check=Dutu::get()->where('id',$dt['iddutu'])->first()->getattend->where('month',$request->month)->where('year',$request->year);
                    if(count($check) == 0) //Chưa có  bản ghi nào, INSERT
                    {
                        try {
                        Attendance::create(
                            ['iddutu' => $dt['iddutu'],
                            'month' => $request->month,
                            'year' => $request->year,
                            'status' => $dt['status'],
                            'note' => $dt['note'],
                            'iduser' => Auth::id(),
                            ]);                        
                        } catch (\Exception $e) {
                            $errors_sql->push($e->getMessage());
                            // return $e->getMessage(); ghi log lỗi, đẩy lỗi vào biến và show ra view
                            
                        }
                    }
                    else{
                        try {
                        Attendance::where('iddutu',$dt['iddutu'])->where('month',$request->month)->where('year',$request->year)->update(
                            ['status' => $dt['status'],
                            'note' => $dt['note'],
                            ]);                        
                        } catch (\Exception $e) {
                            $errors_sql->push($e->getMessage());
                            // return $e->getMessage(); ghi log, đẩy lỗi vào biến rồi return ra view
                            
                        }
                    }
                    
                }
            }
            return $errors_sql; //return kèm lỗi
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($month,$year)
    {
        //
        // if(Auth::user()->roleid != 1 && Auth::user()->roleid != 2)
        // {
        //     abort(403,"Bạn không có quyền truy cập vào trang này!!!");
        // }
        $index = 1;
        if(Auth::user()->hasRole('nhomtruong'))
        {
            $idzone = Dutu::findOrFail(Auth::user()->id)->idzone;
            $lstdutu = Dutu::where('idstatus',1)->where('idzone',$idzone)->with(['getattend' => function($query) use ( $month,$year ){
                $query->where('month',$month)->where('year',$year);
            }])->get(); //Constraining Eager Loads
            if($lstdutu->count() == 0)
            {
                abort (404);
            }
        }
        else
        {
            $lstdutu = Dutu::where('idstatus',1)->with(['getattend' => function($query) use ( $month,$year ){
                $query->where('month',$month)->where('year',$year);
            }])->get(); //Constraining Eager Loads
            if ($lstdutu->count() == 0)
            {
                abort (404);
            }
        }
        
        if($lstdutu->first()->getattend->count() == 0)
        {
            // abort (404);
        }
        // dd($lstdutu);
        return view ('admin.diemdanh.show',compact('lstdutu','index'));
        
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
    public function update(Request $request, $id)
    {
        //
        dd('update AttendanceController');
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
