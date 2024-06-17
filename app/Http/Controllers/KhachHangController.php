<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    public function index()
    {
        $db = DB::table('KhachHang')->get();
        return view('Admin/KhachHang/index', ['db' => $db]);
    }
    public function create()
    {
        return view('Admin/KhachHang/create');
    }
    public function store(Request $request)
    {  
        $KhachHang = new KhachHang;
        $KhachHang->MaKH = $request->input('MaKH');
        $KhachHang->tenKH = $request->input('TenKH');
        $KhachHang->Email = $request->input('Email');
        $KhachHang->DiaChi = $request->input('DiaChi');
        $KhachHang->SDT = $request->input('SDT');        
        $KhachHang->save();
        
        return redirect()->route('KhachHang.index');
    }
    public function show($id)
    {
        $data = KhachHang::where('MaKH', $id)->first();
        return view('Admin/KhachHang/Detail', ['db'=>$data]);
    }
    public function edit($id)
    {
        $data = KhachHang::where('MaKH', $id)->first();
        return view('Admin/KhachHang/update', ['db'=>$data]);
    }
    public function update(Request $request, $id)
    {
        KhachHang::where('MaKH', $id)->update([
            'TenKH' => $request->input('TenKH'),
            'Email' => $request->input('Email'),
            'DiaChi' => $request->input('DiaChi'),
            'SDT' => $request->input('SDT')
            ]);
        return redirect()->route('KhachHang.index');
    }
    public function destroy($id)
    {
        KhachHang::where('MaKH', $id)->delete();
        return redirect()->route('KhachHang.index');
    }
}
