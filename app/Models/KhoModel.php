<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoModel extends Model
{
    use HasFactory;

    protected $table = 'kho';
    protected $primaryKey = 'MaSP';
    public $timestamps = false;
}
