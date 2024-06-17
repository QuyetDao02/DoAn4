<?php

namespace App\Http\Controllers;

use App\Models\LoaiDoNoiThat;
use Illuminate\Http\Request;

class LoaiDoNoiThatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = LoaiDoNoiThat::all();
        return view('Admin/LoaiDoNoiThat/index',['db'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/LoaiDoNoiThat/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LoaiDoNoiThat::create($request->all());
        return redirect()->route('LoaiDoNoiThat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LoaiDoNoiThat::where('id', $id)->first();
        return view('Admin/LoaiDoNoiThat/Detail', ['db'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LoaiDoNoiThat::where('id', $id)->first();
        return view('Admin/LoaiDoNoiThat/update', ['db'=>$data]);
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
        LoaiDoNoiThat::where('id', $id)->update([
            'TenLDNT' => $request->input('TenLDNT'),
            'MoTa' => $request->input('MoTa')
            ]);

        return redirect()->route('LoaiDoNoiThat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LoaiDoNoiThat::where('id', $id)->delete();
        return redirect()->route('LoaiDoNoiThat.index');
    }
}
