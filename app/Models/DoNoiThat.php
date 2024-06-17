<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoNoiThat extends Model
{
    use HasFactory;
    protected $table="DoNoiThat";
    protected $primayKey = 'id';
    protected $fillable = [
        'id', 
        'TenDNT', 
        'MaLDNT', 
        'HinhAnh',
        'GiaBan',
        'MoTa'
    ];
    public $timestamps = false;
}
