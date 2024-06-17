<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietAnh extends Model
{
    use HasFactory;
    protected $table="ChiTietAnh";
    protected $primayKey = 'MaCT';
    protected $fillable = [
        'MaCT',
        'id', 
        'HinhAnh'
    ];
    public $timestamps = false;
}
