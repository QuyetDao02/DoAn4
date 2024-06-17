<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHangBan;
use App\Models\DonHangBan;
use App\Models\KhachHang;
use App\Models\LoaiDoNoiThat;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    public function qldonhang()
    {
        $db = DonHangBan::all();
        return view('donhang',['donhang'=>$db]);
    }
    public function qldonhangchitiet($id)
    {
        $donhang = DonHangBan::find($id);
        $chitiet = ChiTietDonHangBan::where('id',$id)->get();
        return view('donhangchitiet',['donhang'=>$donhang,'chitiet'=>$chitiet]);
    }
    public function Checkout()
    {
        $ldnt = LoaiDoNoiThat::all();
        $cartItems = \Cart::getContent();
        $kh = KhachHang::all();
        return view('Home/checkout',['LoaiDoNoiThat' => $ldnt], ['cartItems' => $cartItems])->with('kh', $kh);
    }
    public function store(Request $request)
    {
        $db = new DonHangBan;
       
        $db->MaKH = $request->input('MaKH');
        $db->DiaChi = $request->input('DiaChi');
        $db->TinhTrang = 0;
        $db->NgayLap = date('Y-m-d');
        $db->GhiChu = $request->input('GhiChu');    
        $db->TongTien = \Cart::getTotal();

        $db->save();

        $cartItems = \Cart::getContent();
        foreach($cartItems as $sp){
            $db1 = new ChiTietDonHangBan;
            $db1->id=$db->id;
            $db1->MaDNT=$sp->id;
            $db1->Gia=$sp->price;
            $db1->SoLuong=$sp->quantity;
            $db1->save();
        }
        \Cart::clear();
        return redirect()->route('index');
    }
}
