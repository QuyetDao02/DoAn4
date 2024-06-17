<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHangBan extends Model
{
    use HasFactory;
    protected $table="ChiTietDHB";
    protected $primayKey = 'id';
    protected $fillable = [
        'id', 
        'MaDNT', 
        'SoLuong', 
        'Gia'
    ];
    public $timestamps = false;
}
