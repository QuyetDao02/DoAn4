<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table="KhachHang";
    protected $primayKey = 'MaKH';
    protected $fillable = [
        'MaKH', 
        'TenKH', 
        'Email',
        'DiaChi', 
        'SDT'
    ];
    public $timestamps = false;
}
