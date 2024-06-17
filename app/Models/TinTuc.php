<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "TinTuc";
    protected $primaryKey = "MaTT";
    protected $fillable = [
        'MaTT', 
        'TieuDe', 
        'NoiDung', 
        'Anh',
        'MaNV',
        'NgayDang'
    ];
    public $timestamps = false;
}
