<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#use Illuminate\Support\Collection::toSql;
use Illuminate\Support\Facades\DB;

class tb_konsul_online extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id_konsul';
    // public $timestamps = true;
    protected $table = 'tb_konsul_online';
    // protected $dates = ['created_date', 'updated_date'];
    //  const created_at = 'created_date';
    // const updated_at = 'updated_date';
    protected $fillable = ['id_konsul', 'no_tiket' ,'nama', 'jabatan', 'unit_kerja', 'no_hp', 'email', 'layanan_id', 'judul', 'pic_id', 'koor_id', 'status_id', 'created_by'];

    // public static function kode()
    // {
    // $kode = DB::table('tb_konsul_online')->max('id_konsul');
		  //   	$addNol = '';
		  //   	$kode = str_replace("KO", "", $kode);
		  //   	$kode = (int) $kode + 1;
		  //       $incrementKode = $kode;

		  //   	if (strlen($kode) == 1) {
		  //   		$addNol = "00000";
		  //   	} elseif (strlen($kode) == 2) {
		  //   		$addNol = "0000";
		  //   	} elseif (strlen($kode == 3)) {
		  //   		$addNol = "000";
		  //   	} elseif (strlen($kode == 4)) {
		  //   		$addNol = "00";
		  //   	} elseif (strlen($kode == 5)) {
		  //   		$addNol = "0";
		  //   	}

		  //   	$kodeBaru = "KO".$addNol.$incrementKode;
		  //   	return $kodeBaru;
		  //   }


}
