<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table="HoaDonNhap";
    protected $primayKey = 'id';
    protected $fillable = [
        'id', 
        'NgayLap', 
        'MaNV', 
        'DiaChi',
        'TinhTrang',
        'TongTien',
        'MaNCC'
    ];
    public $timestamps = false;
}
