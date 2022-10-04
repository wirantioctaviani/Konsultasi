<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_pic extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'history_pic';
    protected  $primaryKey = 'id';
    protected $fillable = ['id_konsul', 'no_tiket','pic_lama', 'pic_baru', 'subbid_id_lama', 'subbid_id_baru', 'layanan_id_lama', 'layanan_id_baru' , 'ket_pic', 'changed_by'];
}
