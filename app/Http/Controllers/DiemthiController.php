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
    public function index()
    {
        //
        $lstdiemthi = Diemthi::all();
        return view('diemthi.list',compact('lstdiemthi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        //
        // $lstdutu = Dutu::all();
        $lstdutu = Dutu::with('nameyear')->get();
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

        if(Auth::user()->roleid != 1)
        {
            abort(403, 'Bạn không có quyền truy cập vào trang này!!!');
        }
        else
        {
            $data = json_decode($request->data, true);
            $roleid = Auth::user()->roleid;
            $lstdiemthi = Diemthi::all();
            foreach ($data as $dt) {
                if(Diemthi::validator($dt)->fails())
                {
                    return -1; //validate không thành công
                }
                else
                {
                    if($lstdiemthi->where('iddutu','=',$dt['iddutu'])->where('idnam','=',$dt['idnam'])){ //update diem thi
                        return "Update";
                        try {
                            Diemthi::where('iddutu',$dt['iddutu'])->where('idnam',$dt['idnam'])->update(['diem' => $dt['diem']]);
                        } catch (Exception $e) {
                            return 0;
                        }
                    }
                    else{
                        return "create";
                        try {
                            Diemthi::create([
                                'iddutu' => $dt['iddutu'],
                                'idnam' => $dt['idnam'],
                                'diem' => $dt['diem'],
                                'nam' => $dt['nam'],
                            ]);
                            return 1;
                        } catch (Exception $e) {
                            return 0;
                        }
                    }
                }
            }
        }
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
