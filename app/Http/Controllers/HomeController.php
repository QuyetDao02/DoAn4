<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\ChiTietAnh;
use App\Models\DoNoiThat;
use App\Models\LoaiDoNoiThat;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function layout(){
        // $dnt = DoNoiThat::all();
        $dnt = DB::table('DoNoiThat')->get();
        $ldnt = DB::table('LoaiDoNoiThat')->get();
        return view('Home/layout',['DoNoiThat' => $dnt],['LoaiDoNoiThat' => $ldnt]);
    }
    public function index(){
        // $dnt = DoNoiThat::all();
        $dnt = DB::table('DoNoiThat')
        ->join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->select('*')
        ->get();
        
        $ldnt = DB::table('LoaiDoNoiThat')->get();

        $new = DB::table('DoNoiThat')
        ->join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->select('*')
        ->orderByDesc('DoNoiThat.id')
        ->take(6)
        ->get();

        $sell = DB::table('DoNoiThat')
        ->join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->join('ChiTietDHB', 'DoNoiThat.id', '=', 'ChiTietDHB.MaDNT')
        ->select(DB::raw('SUM(ChiTietDHB.SoLuong) as TongSoLuong', 'DoNoiThat.id', 'DoNoiThat.TenDNT', 'DoNoiThat.HinhAnh', 'DoNoiThat.MoTa', 'ChiTietGia.GiaBan', 'DoNoiThat.MaLDNT' ))
        ->groupBy('DoNoiThat.id', 'DoNoiThat.TenDNT', 'DoNoiThat.HinhAnh', 'DoNoiThat.MoTa', 'ChiTietGia.GiaBan', 'DoNoiThat.MaLDNT')
        ->orderByDesc('ChiTietDHB.SoLuong')
        ->get();
        return view('Home/index',['DoNoiThat' => $dnt], ['LoaiDoNoiThat' => $ldnt])->with('new', $new);
    }
    public function category($id){
        $ldnt = LoaiDoNoiThat::all();
        $dnt = DoNoiThat::join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->where('DoNoiThat.MaLDNT', $id)
        ->select('*')->paginate(9);
        return view('Home/category', ['LoaiDoNoiThat' => $ldnt],['dnt' => $dnt]);
    }
    public function login(){
        $ldnt = DB::table('LoaiDoNoiThat')->get();
        return view('Home/login', ['LoaiDoNoiThat' => $ldnt]);
    }
    public function cart(){
        $ldnt = DB::table('LoaiDoNoiThat')->get();
        return view('Home/cart',['LoaiDoNoiThat' => $ldnt]);
    }
    public function product($id){
        $ldnt = LoaiDoNoiThat::all();
        $dnt = DoNoiThat::join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->join('LoaiDoNoiThat', 'DoNoiThat.MaLDNT', '=', 'LoaiDoNoiThat.id')
        ->where('DoNoiThat.id', $id)
        ->select('DoNoiThat.id', 'LoaiDoNoiThat.TenLDNT', 'DoNoiThat.TenDNT', 'DoNoiThat.MoTa', 'ChiTietGia.GiaBan', 'DoNoiThat.HinhAnh')->first();
        dd($dnt);
        $ct = ChiTietAnh::all();
        $sp = DoNoiThat::join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->join('LoaiDoNoiThat', 'DoNoiThat.MaLDNT', '=', 'LoaiDoNoiThat.id')
        ->select('DoNoiThat.id', 'LoaiDoNoiThat.TenLDNT', 'DoNoiThat.TenDNT', 'DoNoiThat.MoTa', 'ChiTietGia.GiaBan', 'DoNoiThat.HinhAnh')->get();
        return view('Home/product',['LoaiDoNoiThat' => $ldnt],['dnt' => $dnt])->with('ct', $ct)->with('sp', $sp);
    }
    public function blog(){
        $tt = DB::table('TinTuc')->get();
        $ldnt = DB::table('LoaiDoNoiThat')->get();
        return view('Home/blog',['TinTuc'=>$tt], ['LoaiDoNoiThat' => $ldnt]);
    }
    public function blog_detail($id){
        $tt = TinTuc::where('MaTT', $id)->first();
        $ldnt = DB::table('LoaiDoNoiThat')->get();
        return view('Home/blog-detail', ['TinTuc'=>$tt], ['LoaiDoNoiThat' => $ldnt]);
    }
    public function contact(){
        return view('Home/contact');
    }
}
