<?php

namespace App\Http\Controllers;

use App\Models\ChiTietAnh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ChiTietAnhController extends Controller
{
    public function create($id)
    {
        return view('Admin/ChiTietAnh/create', ['id' => $id]);
    }
    public function store(Request $request, $id)
    {  
        $ChiTietAnh = new ChiTietAnh;
        $ChiTietAnh->id = $id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/UploadFile/Image' . $filename);
            Image::make($image->getRealPath())->save($path);
            $ChiTietAnh->HinhAnh = '/UploadFile/Image' . $filename;
        }
        $ChiTietAnh->save();
        
        return redirect('/DoNoiThat/Show/'. $id);
    }
    public function destroy($id)
    {
        ChiTietAnh::where('id', $id)->delete();
        return redirect()->route('ChiTietAnh.index');
    }
}
