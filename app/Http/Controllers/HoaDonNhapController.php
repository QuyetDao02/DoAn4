<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHDN;
use App\Models\HoaDonNhap;
use App\Models\Kho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoaDonNhapController extends Controller
{
    public function index()
    {
        $db = DB::table('HoaDonNhap')
        ->join('NhaCungCap', 'HoaDonNhap.MaNCC', '=', 'NhaCungCap.MaNCC')->where('TinhTrang', 0)->get();
        return view('Admin/HoaDonNhap/index', ['db' => $db]);
    }
    public function index1()
    {
        $db = DB::table('HoaDonNhap')
        ->join('NhaCungCap', 'HoaDonNhap.MaNCC', '=', 'NhaCungCap.MaNCC')->where('TinhTrang', 1)->get();
        return view('Admin/HoaDonNhap/index1', ['db' => $db]);
    }


    public function create()
    {
        $ncc = DB::table('NhaCungCap')->get();
        $nv = DB::table('NhanVien')->get();
        return view('Admin/HoaDonNhap/create', ['ncc'=>$ncc], ['nv' => $nv]);
    }

    public function store(Request $request)
    {
        $HoaDonNhap = new HoaDonNhap;
        $HoaDonNhap->MaNV = $request->input('MaNV');
        $HoaDonNhap->NgayNhap = $request->input('NgayNhap');
        $HoaDonNhap->TinhTrang = intval($request->input('TinhTrang'));
        $HoaDonNhap->TongTien = 0;
        $HoaDonNhap->MaNCC = $request->input('MaNCC');
        $HoaDonNhap->save();
        if ($HoaDonNhap->TinhTrang == 0) {
            return redirect()->route('HoaDonNhap.index');
        } else {
            return redirect()->route('HoaDonNhap.index1');
        }
    }

    public function edit($id)
    {
        $data = HoaDonNhap::where('id', $id)->first();
        $ncc = DB::table('NhaCungCap')->get();
        $nv = DB::table('NhanVien')->get();
        return view('Admin/HoaDonNhap/update', ['db' => $data], ['ncc'=>$ncc])->with('nv', $nv);
    }

    public function update(Request $request, $id)
    {
        $HoaDonNhap = HoaDonNhap::findOrFail($id);
        $HoaDonNhap->MaNV = $request->input('MaNV');
        $HoaDonNhap->NgayNhap = $request->input('NgayNhap');
        $HoaDonNhap->TinhTrang = intval($request->input('TinhTrang'));
        $HoaDonNhap->MaNCC = $request->input('MaNCC');
        $HoaDonNhap->save();
        if ($HoaDonNhap->TinhTrang == 0) {
            return redirect()->route('HoaDonNhap.index');
        } else {
            return redirect()->route('HoaDonNhap.index1');
        }
    }

    public function destroy($id)
    {
        $data = HoaDonNhap::where('id', $id)->first();
        if ($data->TinhTrang == 0) {
            $db = ChiTietHDN::all();
            foreach ($db as $item) {
                if ($item->id == $id) {
                    $kho = Kho::where('MaDNT', $item->MaDNT)->first();
                    $soluong = $kho->SoLuong - $item->SoLuong;
                    Kho::where('MaDNT', $item->MaDNT)->update([
                        'SoLuong' => $soluong
                    ]);
                    ChiTietHDN::where('MaDNT', $item->MaDNT)->delete();

                }
            }


        }
        HoaDonNhap::where('id', $id)->delete();
        return redirect()->route('HoaDonNhap.index');
    }
}