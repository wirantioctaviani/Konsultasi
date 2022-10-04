<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mstr_pic extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mstr_pic';
    protected $fillable = ['id_user', 'id_layanan', 'id_bidang', 'id_role', 'is_active'];
}
