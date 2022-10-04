<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function konsul_online()
	    {
	    	$data_layanan = \App\Models\mstr_layanan::all();
	    	return view('users.user_form_konsulonline',['data_layanan' => $data_layanan]);
	    }

    public function create_konsul(Request $request)
	    {
	    	date_default_timezone_set("Asia/Jakarta");
	    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
	            'nama'  			=> $request->nama,
	            'jabatan'         	=> $request->jabatan,
	            'unit_kerja'    	=> $request->unit_kerja,
	            'no_hp'        		=> $request->no_hp,
	            'email'        		=> $request->email,
	            'id_layanan'        => $request->id_layanan,
	            'judul'        		=> $request->judul,
	            'id_pic'        	=> '1',
	            'id_koor'        	=> '991',
	            'id_status'        	=> '1',
	            'created_at'		=> date('Y-m-d H:i:s'),
	            'updated_at'		=> date('Y-m-d H:i:s'),
	            'created_by'		=> 'wiranti'
	        ]);

	        $data_konsul_detail = new \App\Models\tb_konsul_detail;
	        $data_konsul_detail->id_konsul 		= $data_konsul;
	        $data_konsul_detail->detail 		= $request->detail;
	        $data_konsul_detail->dokumen 		= '';
	        $data_konsul_detail->created_by 	= 'wiranti';
	        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
	        $data_konsul_detail->is_answered 	= '0';
	        $data_konsul_detail->save();
	        return redirect('/konsul_online');
    	}

    public function list_konsul_online()
	    {
	    	#\App\Models\tb_konsul_online::create($request->all());
	    	return view('users.user_list_konsulonline');
	    }
} 
