<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamCongModel extends Model
{
    use HasFactory;

    protected $table = 'chamcong';
    protected $primaryKey = 'IDCC';
    public $timestamps = false;
}
