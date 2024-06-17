<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHDN;
use App\Models\HoaDonNhap;
use App\Models\Kho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietHDNController extends Controller
{
    public function index($id)
    {
        $gianhap = 0;
      
        $db = DB::table('ChiTietHDN')->join('DoNoiThat', 'ChiTietHDN.MaDNT', '=', 'DoNoiThat.id')->where('ChiTietHDN.id', $id)
        ->select('ChiTietHDN.id', 'ChiTietHDN.MaDNT', 'ChiTietHDN.SoLuong', 'DoNoiThat.TenDNT', 'ChiTietHDN.Gia')->get();
        foreach($db as $item){
            $gianhap += $item->Gia * $item->SoLuong;
        }
        HoaDonNhap::where('id', $id)->update([
            'TongTien' => $gianhap
            ]);
        return view('Admin/ChiTietHDN/index', ['data'=>$db], ['id'=>$id]);
    }

    public function create($id)
    {
        $data = DB::table('DoNoiThat')->get();
        return view('Admin/ChiTietHDN/create', ['id'=>$id], ['data'=>$data]);
    }

    public function store(Request $request, $id)
    {  
        
       
        $chitietHDN = new ChiTietHDN;
        $chitietHDN->id = $id;
        $chitietHDN->MaDNT = $request->input('MaDNT');
        $chitietHDN->SoLuong = $request->input('SoLuong');

        $db = DB::table('DoNoiThat')
        ->join('ChiTietGia', 'DoNoiThat.id', '=', 'ChiTietGia.id')
        ->select('*')
        ->where('DoNoiThat.id', $chitietHDN->MaDNT)->first();

        $chitietHDN->Gia = $db->GiaNhap;     
        $chitietHDN->save();
        
        $kho = Kho::where('MaDNT', $chitietHDN->MaDNT)->first();
        $soluong = $kho->SoLuong + $chitietHDN->SoLuong;
        Kho::where('MaDNT', $chitietHDN->MaDNT)->update([
            'SoLuong' => $soluong
            ]);
        
        return redirect('ChiTietHDN/'. $id);
    }

    public function edit($id)
    {
        $data = ChiTietHDN::where('id', $id)->first();
        return view('Admin/ChiTietHDN/update', ['db'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data = ChiTietHDN::where('id', $id)->first();
        $kho = Kho::where('MaDNT', $data->MaDNT)->first();
        $soluong = $kho->SoLuong - $data->SoLuong;

        $chitietHDN = ChiTietHDN::findOrFail($id);
        $chitietHDN->SoLuong = $request->input('SoLuong');  
        $chitietHDN->save();
        $soluong += $chitietHDN->SoLuong;
        Kho::where('MaDNT', $chitietHDN->MaDNT)->update([
            'SoLuong' => $soluong
            ]);
        return redirect('ChiTietHDN/' . $chitietHDN->id);
    }

    public function destroy($id)
    {
        $data = ChiTietHDN::where('id', $id)->first();
        $kho = Kho::where('MaDNT', $data->MaDNT)->first();
        $soluong = $kho->SoLuong - $data->SoLuong;
        Kho::where('MaDNT', $data->MaDNT)->update([
            'SoLuong' => $soluong
            ]);
        ChiTietHDN::where('MaDNT', $data->MaDNT)->delete();
        return redirect('ChiTietHDN/' . $id);
    }
}
