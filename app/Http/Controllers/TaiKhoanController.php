<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $db = DB::table('user')->get();
        return view('Admin/TaiKhoan/index', ['db' => $db]);
    }
    public function create()
    {
        return view('Admin/TaiKhoan/create');
    }
    public function store(Request $request)
    {  
        $TaiKhoan = new TaiKhoan;
        $TaiKhoan->userName = $request->input('UserName');
        $TaiKhoan->Password = $request->input('Password');
        $TaiKhoan->Role = $request->input('role');        
        $TaiKhoan->save();
        
        return redirect()->route('TaiKhoan.index');
    }
    public function show($id)
    {
        $data = TaiKhoan::where('userId', $id)->first();
        return view('Admin/TaiKhoan/Detail', ['db'=>$data]);
    }
    public function edit($id)
    {
        $data = TaiKhoan::where('userId', $id)->first();
        return view('Admin/TaiKhoan/update', ['db'=>$data]);
    }
    public function update(Request $request, $id)
    {
        TaiKhoan::where('userId', $id)->update([
            'UserName' => $request->input('UserName'),
            'Password' => $request->input('Password'),
            'role' => $request->input('role')
            ]);
        return redirect()->route('TaiKhoan.index');
    }
    public function destroy($id)
    {
        TaiKhoan::where('userId', $id)->delete();
        return redirect()->route('TaiKhoan.index');
    }
}
