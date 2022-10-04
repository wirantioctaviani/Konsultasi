<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mstr_layanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mstr_layanan';
    protected $fillable = ['jenis_layanan','subbid_id', 'bidang_id'];
}
