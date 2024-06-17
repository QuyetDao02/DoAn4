<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiDoNoiThat extends Model
{
    use HasFactory;
    protected $table="LoaiDoNoiThat";
    protected $primayKey = 'id';
    protected $fillable=[
        'id',
        'TenLDNT',
        'MoTa'
    ];
    public $timestamps = false;
}
