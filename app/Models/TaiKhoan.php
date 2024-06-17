<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table="User";
    protected $primayKey = 'userID';
    protected $fillable = [
        'userID', 
        'UserName', 
        'Password', 
        'role'
    ];
    public $timestamps = false;

}
