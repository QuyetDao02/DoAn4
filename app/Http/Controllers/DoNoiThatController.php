<?php

namespace App\Http\Controllers;

use App\Models\ChiTietAnh;
use App\Models\ChiTietGia;
use App\Models\Kho;
use Illuminate\Http\Request;
use App\Models\DoNoiThat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class DoNoiThatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = DB::table('DoNoiThat')
            ->join('LoaiDoNoiThat', 'DoNoiThat.MaLDNT', '=', 'LoaiDoNoiThat.id')
            ->select(DB::raw('DoNoiThat.id, DoNoiThat.TenDNT, DoNoiThat.MoTa, DoNoiThat.HinhAnh, DoNoiThat.MaLDNT, LoaiDoNoiThat.TenLDNT'))
            ->get();
        return view('Admin/DoNoiThat/index', ['db' => $db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $db = DB::table('LoaiDoNoiThat')
            ->select('*')
            ->get();
        return view('Admin/DoNoiThat/create', ['db' => $db]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $donoithat = new DoNoiThat;
        $donoithat->tenDNT = $request->input('TenDNT');
        $donoithat->maLDNT = $request->input('MaLDNT');
        
        $donoithat->moTa = $request->input('MoTa');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/UploadFile/Images/' . $filename);
            Image::make($image->getRealPath())->save($path);
            $donoithat->hinhAnh = '/UploadFile/Images/' . $filename;
        }        
        $donoithat->save();
        $kho = new Kho;
        $kho->MaDNT = $donoithat->id;
        $kho->SoLuong = 0;
        $kho->save();
        $chitietgia = new ChiTietGia;
        $chitietgia->id = $donoithat->id;
        $chitietgia->GiaNhap = $request->input('GiaNhap');
        $chitietgia->GiaBan = $request->input('GiaBan');
        $chitietgia->save();
        return redirect()->route('DoNoiThat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DoNoiThat::join('LoaiDoNoiThat', 'DoNoiThat.MaLDNT', '=', 'LoaiDoNoiThat.id')->where('DoNoiThat.id', $id)
        ->select('DoNoiThat.id', 'LoaiDoNoiThat.TenLDNT', 'DoNoiThat.HinhAnh', 'DoNoiThat.TenDNT', 'DoNoiThat.MoTa')->first();
        $ct = ChiTietAnh::all();
        // dd($data);
        return view('Admin/DoNoiThat/Detail', ['db'=>$data])->with('ct', $ct)->with('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = DB::table('LoaiDoNoiThat')
            ->select('*')
            ->get();
        $data = DB::table('DoNoiThat')->join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')->where('DoNoiThat.id', $id)
        ->select('*')->first();
        return view('Admin/DoNoiThat/update', ['db'=>$data], ['data'=>$db]);
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
        $donoithat = DoNoiThat::findOrFail($id);
        $donoithat->tenDNT = $request->input('TenDNT');
        $donoithat->maLDNT = $request->input('MaLDNT');
        $donoithat->moTa = $request->input('MoTa');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/UploadFile/Images/' . $filename);
            Image::make($image->getRealPath())->save($path);
            $donoithat->hinhAnh = '/UploadFile/Images/' . $filename;
        }
        $donoithat->save();
        $chitietgia = ChiTietGia::findOrFail($id);
        $chitietgia->GiaNhap = $request->input('GiaNhap');
        $chitietgia->GiaBan = $request->input('GiaBan');
        $chitietgia->save();
        return redirect()->route('DoNoiThat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kho::where('MaDNT', $id)->delete();
        ChiTietGia::where('id', $id)->delete();
        DoNoiThat::where('id', $id)->delete();
        return redirect()->route('DoNoiThat.index');
    }
}