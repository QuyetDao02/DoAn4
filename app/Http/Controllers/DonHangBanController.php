<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHangBan;
use App\Models\DonHangBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangBanController extends Controller
{
    public function index()
    {
        $db = DB::table('DonHangBan')
        ->join('KhachHang', 'DonHangBan.MaKH', '=', 'KhachHang.MaKH')->where('TinhTrang',0)->get();
        return view('Admin/DonHangBan/index', ['db' => $db]);
    }
    public function index1()
    {
        $db = DB::table('DonHangBan')
        ->join('KhachHang', 'DonHangBan.MaKH', '=', 'KhachHang.MaKH')->where('TinhTrang',1)->get();
        return view('Admin/DonHangBan/index1', ['db' => $db]);
    }

    // public function create()
    // {
    //     return view('Admin/DonHangBan/create');
    // }

    // public function store(Request $request)
    // {  
    //     $donhangban = new DonHangBan;
    //     $donhangban->MaKH = $request->input('MaKH');
    //     $donhangban->NgayLap = $request->input('NgayLap');
    //     $donhangban->DiaChi = $request->input('DiaChi');
    //     $donhangban->TinhTrang = intval($request->input('TinhTrang'));
    //     $donhangban->TongTien = $request->input('TongTien');
    //     $donhangban->GhiChu = $request->input('GhiChu');
    //     $donhangban->save();

    //     return redirect()->route('DonHangBan.index');
    // }

    public function edit($id)
    {
        $data = DonHangBan::where('id', $id)->first();
        return view('Admin/DonHangBan/update', ['db'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $donhangban = DonHangBan::findOrFail($id);
        $donhangban->MaKH = $request->input('MaKH');
        $donhangban->NgayLap = $request->input('NgayLap');
        $donhangban->DiaChi = $request->input('DiaChi');
        $donhangban->TinhTrang = intval($request->input('TinhTrang'));
        $donhangban->TongTien = $request->input('TongTien');
        $donhangban->GhiChu = $request->input('GhiChu');
        $donhangban->save();
        return redirect()->route('DonHangBan.index');
    }

    public function destroy($id)
    {
        DonHangBan::where('id', $id)->delete();
        return redirect()->route('DonHangBan.index');
    }
}
