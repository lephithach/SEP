<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangModel extends Model
{
    use HasFactory;

    protected $table = 'khachhang';
    protected $primaryKey = 'SDTKhachHang';
    public $timestamps = false;

}
