<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_konsul_detail extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'tb_konsul_detail';
    protected  $primaryKey = 'id_detail';
    // protected $dates = ['created_at', 'updated_at'];
    // const created_at = 'created_date';
    // const updated_at = 'updated_date';
    protected $fillable = ['konsul_id', 'detail','details', 'dokumen', 'created_by', 'is_answered'];
}
