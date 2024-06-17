<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietGia extends Model
{
    use HasFactory;
    protected $table="ChiTietGia";
    protected $primayKey = 'id';
    protected $fillable = [
        'id', 
        'GiaNhap', 
        'GiaBan', 
    ];
    public $timestamps = false;
}
