<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $table = "NhaCungCap";
    protected $primayKey="MaNCC";
    protected $fillable = [
        'MaNCC', 
        'TenNCC', 
        'DiaChi', 
        'SDT'
    ];
    public $timestamps = false;
}
