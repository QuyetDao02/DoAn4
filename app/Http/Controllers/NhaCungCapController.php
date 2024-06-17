<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhaCungCapController extends Controller
{
    public function index()
    {
        $db = DB::table('NhaCungCap')->get();
        return view('Admin/NhaCungCap/index', ['db' => $db]);
    }
    public function create()
    {
        return view('Admin/NhaCungCap/create');
    }
    public function store(Request $request)
    {  
        $NhaCungCap = new NhaCungCap;
        $NhaCungCap->tenNCC = $request->input('TenNCC');
        $NhaCungCap->DiaChi = $request->input('DiaChi');
        $NhaCungCap->SDT = $request->input('SDT');        
        $NhaCungCap->save();
        
        return redirect()->route('NhaCungCap.index');
    }
    public function show($id)
    {
        $data = NhaCungCap::where('MaNCC', $id)->first();
        return view('Admin/NhaCungCap/Detail', ['db'=>$data]);
    }
    public function edit($id)
    {
        $data = NhaCungCap::where('MaNCC', $id)->first();
        return view('Admin/NhaCungCap/update', ['db'=>$data]);
    }
    public function update(Request $request, $id)
    {
        NhaCungCap::where('MaNCC', $id)->update([
            'TenNCC' => $request->input('TenNCC'),
            'DiaChi' => $request->input('DiaChi'),
            'SDT' => $request->input('SDT')
            ]);
        return redirect()->route('NhaCungCap.index');
    }
    public function destroy($id)
    {
        NhaCungCap::where('MaNCC', $id)->delete();
        return redirect()->route('NhaCungCap.index');
    }
}
