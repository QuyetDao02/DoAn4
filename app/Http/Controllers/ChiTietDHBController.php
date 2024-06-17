<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHangBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiTietDHBController extends Controller
{
    public function index($id)
    {
        $db = DB::table('ChiTietDHB')
        ->join('DoNoiThat', 'ChiTietDHB.MaDNT', '=', 'DoNoiThat.id')->where('ChiTietDHB.id', $id)->get();
        return view('Admin/ChiTietDHB/index', ['data'=>$db]);
    }

    public function create()
    {
        return view('Admin/ChiTietDHB/create');
    }

    public function store(Request $request)
    {  
        $chitietdhb = new ChiTietDonHangBan;
        $chitietdhb->MaDNT = $request->input('MaDNT');
        $chitietdhb->SoLuong = $request->input('SoLuong');
        $chitietdhb->Gia = $request->input('Gia');     
        $chitietdhb->save();
        
        return redirect('ChiTietDHB.index'. $chitietdhb->id);
    }

    // public function edit($id)
    // {
    //     $data = ChiTietDonHangBan::where('id', $id)->first();
    //     return view('Admin/ChiTietDHB/update', ['db'=>$data]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $chitietdhb = ChiTietDonHangBan::findOrFail($id);
    //     $chitietdhb->MaDNT = $request->input('MaDNT');
    //     $chitietdhb->SoLuong = $request->input('SoLuong');
    //     $chitietdhb->Gia = $request->input('Gia');     
    //     $chitietdhb->save();
    //     return redirect('ChiTietDHB/' . $chitietdhb->id);
    // }

    public function destroy($id)
    {
        $ma = $id;
        ChiTietDonHangBan::where('id', $id)->delete();
        return redirect('ChiTietDHB/' . $ma);
    }
}
