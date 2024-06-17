<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHDN extends Model
{
    use HasFactory;
    protected $table="ChiTietHDN";

    protected $fillable = [
        'id', 
        'MaDNT', 
        'SoLuong', 
        'Gia'
    ];
    public $timestamps = false;
}
