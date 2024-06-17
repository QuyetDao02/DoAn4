<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    use HasFactory;
    protected $table="Kho";
    protected $fillable = [
        'MaDNT', 
        'SoLuong'
    ];
    public $timestamps = false;
}
