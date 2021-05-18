<?php

namespace App\Http\Controllers;

use App\Ungsinh;
use Illuminate\Http\Request;
use App\Dutu;
use Redirect;
use Mail;
use App\Http\Requests\UngsinhRequest;
class UngsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tuyensinhs = Ungsinh::all()->where('year',now()->year);
        // return $tuyensinhs;
        return view('tuyensinh.list',compact('tuyensinhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Load những ứng sinh đã đk dự thi trong năm hiện tại
        $tuyensinhs = Ungsinh::all()->where('year',now()->year);
        // load dự tu có đủ điều kiện dự thi;
        $tuoi = now()->year - setting('config.tuoithidcv',''); //Load tuổi
        // return $tuoi;
        $dutus = Dutu::with('getuser')->where('idstatus',1)->where('idyear',4)->whereYear('dob','>',$tuoi)->get()->sortBy('name');
        // duyệt danh sách, rồi loại bỏ những dự tu đã đăng kí vào năm này...
        for ($i = 0; $i < $dutus->count(); $i++) {
            foreach ($tuyensinhs as $tuyensinh) {
                if ($dutus[$i]->getuser->email == $tuyensinh->email) { //check email đã tồn tại thì remove bản ghi đó, thoát vòng lặp trong
                    $dutus->pull($i);
                    break;
                }    
            }
        }
        return view('tuyensinh.create',compact('dutus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UngsinhRequest $request)
    {
        //
        $data = $request->all();
        $arrName = explode(" ",$request->name);
        $request['holyname'] = array_shift($arrName);
        $request['name'] = array_pop($arrName);
        $request['fullname'] = implode(" ", $arrName);
        $request['year'] = now()->year;

        
        try {
            Ungsinh::create($request->all());
            if(!$request->ajax()) //request không là AJ thì gửi mail thông báo
            {
                Mail::send('email.nhanhoso',$data, function($message) use($data) {
                    $message->from('mvog@gmail.com');
                    $message->to($data['email']);
                    $message->subject('Thông báo nhận hồ sơ');
                });
                return Redirect::route('index.tuyensinh');
            }
            // return Redirect::route('tuyensinh.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ungsinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ungsinh  $tuyenSinh
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
     * @param  \App\Ungsinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $arrName = explode(" ",$request->name);
        $request['holyname'] = array_shift($arrName);
        $request['name'] = array_pop($arrName);
        $request['fullname'] = implode(" ", $arrName);
        if (Ungsinh::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Ungsinh::validator($request->all()));
        }
        try {
            Ungsinh::where('id',$id)->update([
                'email' => $request->email,
                'holyname' => $request->holyname,
                'fullname' => $request->fullname,
                'name' => $request->name,
                'dob' => $request->dob,
                'parish' => $request->parish,

            ]);
            return Redirect::route('tuyensinh.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ungsinh  $tuyenSinh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Ungsinh::where('id',$id)->delete();
            return Redirect::back()->with('message','Xoá ứng sinh thành công!!!');
        } catch (\Exception $e) {
            return Redirect::back()->with('message','Không xoá được ứng sinh!!!');
        }
    }

    public function createungsinh()
    {
        return view('tuyensinh.create_ungsinh');
    }

    public function storeungsinh(Request $request)
    {
        // return 12;
        $arrName = explode(" ",$request->name);
        $request['holyname'] = array_shift($arrName);
        $request['name'] = array_pop($arrName);
        $request['fullname'] = implode(" ", $arrName);
        return $request->all();
        if (Ungsinh::validator($request->all())->fails()) {
            # code...
            return Redirect::back()->withErrors(Ungsinh::validator($request->all()));
        }
        // try {
        //     return $request->all();
        //     Ungsinh::create($request->all());
        //     return Redirect::route('tuyensinh.index');
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }
    }
}