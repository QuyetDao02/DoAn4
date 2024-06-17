<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangBan extends Model
{
    use HasFactory;
    protected $table="DonHangBan";
    protected $primayKey = 'id';
    protected $fillable = [
        'id', 
        'NgayLap', 
        'MaKH', 
        'DiaChi',
        'TinhTrang',
        'TongTien',
        'GhiChu'
    ];
    public $timestamps = false;
}
