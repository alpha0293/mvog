<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Diemthi;
use App\Dutu;
use App\Zone;
use App\Year;
class DiemthiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

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
        $lstdiemthi = Diemthi::all();
        $lstdutu = Dutu::with(['getdiem' => function($query) use ($cur_year){
            $query->where('nam',$cur_year);
        }])->where('idstatus',1)->get()->sortBy('name');
        $index = 1;
        $lstzone = Zone::all();
        $lstyear = Year::all();
        // dd($lstdutu->first());
        return view('diemthi.list',compact('lstdutu','index','lstzone','lstyear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->roleid != 1)
        // {
        //     abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        // }
        //
        // $lstdutu = Dutu::all();
        $lstdutu = Dutu::where('idstatus',1)->with('nameyear')->get()->sortBy('name');
        $index = 1;
        $lstzone = Zone::all();
        $lstyear = Year::all();
        return view('diemthi.create',compact('lstdutu','index','lstzone','lstyear'));
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
        $roleid = Auth::user()->roleid;
        $lstdiemthi = Diemthi::all();
        foreach ($data as $dt) {
            // return $dt;
            $dutu = Dutu::find($dt['iddutu']); //thử lấy dutu là ID được gửi từ bảng điểmm vào
            if(!$dutu)
            {
                continue;
            }
            if(Diemthi::validator($dt)->fails())
            {
                $errors_validate->push(Diemthi::validator($dt)->errors());
                // return 123;
                // continue;
            }
            else
            {
                $checktrung = $lstdiemthi->where('iddutu','=',$dt['iddutu'])->where('idnam','=',$dt['idnam']);
                if(count($checktrung) == 0){ //create
                   try {
                        Diemthi::create([
                            'iddutu' => $dt['iddutu'],
                            'idnam' => $dt['idnam'],
                            'diem' => $dt['diem'],
                            'nam' => $dt['nam'],
                        ]);
                    } catch (\Exception $e) {
                        $errors_sql->push($e->getMessage());
                    }           
                }
                else{
                    try {
                        Diemthi::where('iddutu',$dt['iddutu'])->where('idnam',$dt['idnam'])->where('nam',$dt['nam'])->update(['diem' => $dt['diem']]);
                    } catch (\Exception $e) {
                        $errors_sql->push($e->getMessage());
                    }            
                }
            }
        }
        return $errors_validate.$errors_sql;
        // }
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
}
