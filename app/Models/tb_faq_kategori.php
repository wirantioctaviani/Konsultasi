<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_faq_kategori extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'faq_kategori';
    protected  $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'layanan_id'];
}
