<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhoController extends Controller
{
    public function index()
    {
        $db = DB::table('Kho')
            ->join('DoNoiThat', 'DoNoiThat.id', '=', 'Kho.MaDNT')
            ->select('*')
            ->get();
        return view('Admin/Kho/index', ['db' => $db]);
    }
}
