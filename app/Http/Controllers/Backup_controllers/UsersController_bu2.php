<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function konsul_online()
	    {
	    	$data_layanan = \App\Models\mstr_layanan::all();
	    	return view('users.user_form_konsulonline',['data_layanan' => $data_layanan]);
	    }

    public function create_konsul(Request $request)
	    {
	    	$subbid_id = DB::table('mstr_layanan')->where('id_layanan', $request->id_layanan)->value('subbid_id');
	    	#return $subbid_id = $data_layanan->subbid_id;
	    	#$bidang_id = DB::table('mstr_layanan')->select('bidang_id')->where('id_layanan', $request->id_layanan)->first();
	    	$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
	    	$user_pic = DB::table('users')->where('role', 'pic')->where('subbid_id', $subbid_id)->value('id');
	    	#return $user_id = $user->name;
	    	#dd($request->id_layanan);
	    	#dd($user_pic,$user_subkoor);
	    	#$data_user = DB::table('tb_konsul_online')->where('id_layanan', $request->id_layanan)->groupBy('id_pic')->get();
	    	#dd($data_user);


	    	
	    	date_default_timezone_set("Asia/Jakarta");
	    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
	            'nama'  			=> $request->nama,
	            'jabatan'         	=> $request->jabatan,
	            'unit_kerja'    	=> $request->unit_kerja,
	            'no_hp'        		=> $request->no_hp,
	            'email'        		=> $request->email,
	            'id_layanan'        => $request->id_layanan,
	            'judul'        		=> $request->judul,
	            'id_pic'        	=> $user_pic,
	            'id_koor'        	=> $user_subkoor,
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
