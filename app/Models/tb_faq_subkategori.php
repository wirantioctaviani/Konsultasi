<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_faq_subkategori extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'faq_subkategori';
    protected  $primaryKey = 'id_subkategori';
    protected $fillable = ['nama_subkategori', 'jawaban','kategori_id'];
}
