<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_dokumen extends Model
{
    use HasFactory;
    protected $table = 'tb_dokumen';
    protected  $primaryKey = 'id_dokumen';
    protected $fillable = ['konsul_id', 'detail_id','dokumen','created_at', 'updated_at'];
}
