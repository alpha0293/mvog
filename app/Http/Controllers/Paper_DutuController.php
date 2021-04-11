<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaperDutu;

class Paper_DutuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data = json_decode($request->data, true);
        foreach ($data as $dt) {
            # code...
            try {
                $temp = PaperDutu::get()->where('iddutu',$request->iddutu)->where('idpaper',$dt['idpaper']);
                if ($temp->count() == 0) {
                    # code...
                    PaperDutu::create(
                        ['iddutu'=>$request->iddutu,
                        'idpaper'=>$dt['idpaper'],
                        'status'=>$dt['status'],
                        ]);
                    
                }
                else
                {
                    $temp->first()->status = $dt['status'];
                    $temp->first()->save();
                }
                
            } catch (\Exception $e) {
                return $e->getMessage();
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
		PaperDutu::where('id',$id)->update(
		['iddutu'=>$request->iddutu,
		'idpaper'=>$request->idpaper,
		'url'=>$request->url,
		'status'=>$request->status,
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		PaperDutu::where('id',$id)->delete();
        return Redirect::back();
    }
}
