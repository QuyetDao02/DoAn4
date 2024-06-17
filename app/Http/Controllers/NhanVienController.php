<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    public function index()
    {
        $db = DB::table('NhanVien')->get();
        return view('Admin/NhanVien/index', ['db' => $db]);
    }
    public function create()
    {
        return view('Admin/NhanVien/create');
    }
    public function store(Request $request)
    {  
        $NhanVien = new NhanVien;
        $NhanVien->MaNV = $request->input('MaNV');
        $NhanVien->TenNV = $request->input('TenNV');
        $NhanVien->DiaChi = $request->input('DiaChi');
        $NhanVien->SDT = $request->input('SDT');        
        $NhanVien->save();
        
        return redirect()->route('NhanVien.index');
    }
    public function show($id)
    {
        $data = NhanVien::where('MaNV', $id)->first();
        return view('Admin/NhanVien/Detail', ['db'=>$data]);
    }
    public function edit($id)
    {
        $data = NhanVien::where('MaNV', $id)->first();
        return view('Admin/NhanVien/update', ['db'=>$data]);
    }
    public function update(Request $request, $id)
    {
        NhanVien::where('MaNV', $id)->update([
            'TenNV' => $request->input('TenNV'),
            'DiaChi' => $request->input('DiaChi'),
            'SDT' => $request->input('SDT')
            ]);
        return redirect()->route('NhanVien.index');
    }
    public function destroy($id)
    {
        NhanVien::where('MaNV', $id)->delete();
        return redirect()->route('NhanVien.index');
    }
}
