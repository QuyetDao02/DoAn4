<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = DB::table('TinTuc')->get();
        return view('Admin/TinTuc/index', ['db' => $db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $db = DB::table('NhanVien')->get();
        return view('Admin/TinTuc/create', ['db'=>$db]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $TinTuc = new TinTuc;
        $TinTuc->TieuDe = $request->input('TieuDe');
        $TinTuc->NgayDang = $request->input('NgayDang');
        $TinTuc->MaNV = $request->input('MaNV');
        $TinTuc->NoiDung = $request->input('NoiDung');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/UploadFile/TinTuc/' . $filename);
            Image::make($image->getRealPath())->save($path);
            $TinTuc->Anh = '/UploadFile/TinTuc/' . $filename;
        }
        
        $TinTuc->save();
        
        return redirect()->route('TinTuc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TinTuc::join('NhanVien', 'TinTuc.MaNV', '=', 'NhanVien.MaNV')->where('MaTT', $id)->first();

        return view('Admin/TinTuc/Detail', ['db'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TinTuc::where('MaTT', $id)->first();
        $db = DB::table('NhanVien')->get();
        return view('Admin/TinTuc/update', ['db'=>$data], ['data'=> $db]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $TinTuc = TinTuc::findOrFail($id);
        $TinTuc->TieuDe = $request->input('TieuDe');
        $TinTuc->MaNV = $request->input('MaNV');
        $TinTuc->NoiDung = $request->input('NoiDung');
        $TinTuc->NgayDang = $request->input('NgayDang');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/UploadFile/TinTuc/' . $filename);
            Image::make($image->getRealPath())->save($path);
            $TinTuc->Anh = '/UploadFile/TinTuc/' . $filename;
        }
        $TinTuc->save();
        return redirect()->route('TinTuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TinTuc::where('MaTT', $id)->delete();
        return redirect()->route('TinTuc.index');
    }
}