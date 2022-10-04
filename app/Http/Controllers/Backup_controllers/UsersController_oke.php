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
	    	##KODE BELOW OK
	    	#$user_pic = DB::table('users')->where('role', 'pic')->where('subbid_id', $subbid_id)->value('id');
	    	#return $user_id = $user->name;
	    	#dd($request->id_layanan);
	    	#dd($user_pic,$user_subkoor);
	    	#$data_user = DB::table('tb_konsul_online')->where('id_layanan', $request->id_layanan)->groupBy('id_pic')->get();
	    	#dd($subbid_id);

	    	#$kode = \App\Models\tb_konsul_online::kode();
	    	#dd($kode);
	    	#dd($request->all());
	    	if ($subbid_id == "11")
	    	{
							$check = DB::select(DB::raw('select a.active_pic from
										(select DISTINCT
										            a.id,
										            a.name,
										            a.subbid_id,
										            a.role,
										            if(b.id_pic2 is null, "no", "yes") active_pic
										        from users a
										        -- Cari yang lowong
										        left join 
										        (
										            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where role = "pic" and a.subbid_id = "11" 
										 ) a 
							             WHERE active_pic = "no"'));
							#dd("11");
							
							if ($check == null){
											#$subbid_id = DB::table('mstr_layanan')->where('id_layanan', $request->id_layanan)->value('subbid_id');
											#$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
											$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "11") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "yes"
												) a where sort_lowest_case = 1'));
													$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($check_pic);

										}
										
										elseif($check != null)
											{
												$check_pic = DB::select(DB::raw('select id as id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "11") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "no"
												) a where sort_lowest_case = 1'));	
												$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($ids);
											} 

									    	date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'id_layanan'        => $request->id_layanan,
									            'judul'        		=> $request->judul,
									            'id_pic'        	=> $ids,
									            'id_koor'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
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
									        if($data_konsul_detail->dokumen != null){
									        $request->file('dokumen')->move('dokumen/', $request->file('dokumen')->getClientOriginalName());
									        $data_konsul_detail->dokumen 		= $request->file('dokumen')->getClientOriginalName();}
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 
									        return redirect('/konsul_online'); 
			}

			elseif ($subbid_id == "12")
	    	{
							$check = DB::select(DB::raw('select a.active_pic from
										(select DISTINCT
										            a.id,
										            a.name,
										            a.subbid_id,
										            a.role,
										            if(b.id_pic2 is null, "no", "yes") active_pic
										        from users a
										        -- Cari yang lowong
										        left join 
										        (
										            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where role = "pic" and a.subbid_id = "12" 
										 ) a 
							             WHERE active_pic = "no"'));
							#dd("11");
							
							if ($check == null){
											#$subbid_id = DB::table('mstr_layanan')->where('id_layanan', $request->id_layanan)->value('subbid_id');
											#$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
											$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "12") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "yes"
												) a where sort_lowest_case = 1'));
													$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($check_pic);

										}
										
										elseif($check != null)
											{
												$check_pic = DB::select(DB::raw('select id as id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "12") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "no"
												) a where sort_lowest_case = 1'));	
												$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($ids);
											} 

									    	date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'id_layanan'        => $request->id_layanan,
									            'judul'        		=> $request->judul,
									            'id_pic'        	=> $ids,
									            'id_koor'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
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

									        $request->file('dokumen')->move('dokumen/', $request->file('dokumen')->getClientOriginalName());
									        $data_konsul_detail->dokumen 		= $request->file('dokumen')->getClientOriginalName();
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 
									        return redirect('/konsul_online'); 
			}


			elseif ($subbid_id == "21")
	    	{
							$check = DB::select(DB::raw('select a.active_pic from
										(select DISTINCT
										            a.id,
										            a.name,
										            a.subbid_id,
										            a.role,
										            if(b.id_pic2 is null, "no", "yes") active_pic
										        from users a
										        -- Cari yang lowong
										        left join 
										        (
										            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where role = "pic" and a.subbid_id = "21" 
										 ) a 
							             WHERE active_pic = "no"'));
							#dd("11");
							
							if ($check == null){
											#$subbid_id = DB::table('mstr_layanan')->where('id_layanan', $request->id_layanan)->value('subbid_id');
											#$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
											$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "21") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "yes"
												) a where sort_lowest_case = 1'));
													$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($check_pic);

										}
										
										elseif($check != null)
											{
												$check_pic = DB::select(DB::raw('select id as id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "21") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "no"
												) a where sort_lowest_case = 1'));	
												$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($ids);
											} 

									    	date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'id_layanan'        => $request->id_layanan,
									            'judul'        		=> $request->judul,
									            'id_pic'        	=> $ids,
									            'id_koor'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
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

									        $request->file('dokumen')->move('dokumen/', $request->file('dokumen')->getClientOriginalName());
									        $data_konsul_detail->dokumen 		= $request->file('dokumen')->getClientOriginalName();
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 
									        return redirect('/konsul_online'); 
			}


			if ($subbid_id == "22 ")
	    	{
							$check = DB::select(DB::raw('select a.active_pic from
										(select DISTINCT
										            a.id,
										            a.name,
										            a.subbid_id,
										            a.role,
										            if(b.id_pic2 is null, "no", "yes") active_pic
										        from users a
										        -- Cari yang lowong
										        left join 
										        (
										            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where role = "pic" and a.subbid_id = "22" 
										 ) a 
							             WHERE active_pic = "no"'));
							#dd("11");
							
							if ($check == null){
											#$subbid_id = DB::table('mstr_layanan')->where('id_layanan', $request->id_layanan)->value('subbid_id');
											#$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
											$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "22") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "yes"
												) a where sort_lowest_case = 1'));
													$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($check_pic);

										}
										
										elseif($check != null)
											{
												$check_pic = DB::select(DB::raw('select id as id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "22") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "no"
												) a where sort_lowest_case = 1'));	
												$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($ids);
											} 

									    	date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'id_layanan'        => $request->id_layanan,
									            'judul'        		=> $request->judul,
									            'id_pic'        	=> $ids,
									            'id_koor'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
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

									        $request->file('dokumen')->move('dokumen/', $request->file('dokumen')->getClientOriginalName());
									        $data_konsul_detail->dokumen 		= $request->file('dokumen')->getClientOriginalName();
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 
									        return redirect('/konsul_online'); 
			}


			elseif ($subbid_id == "32")
	    	{
							$check = DB::select(DB::raw('select a.active_pic from
										(select DISTINCT
										            a.id,
										            a.name,
										            a.subbid_id,
										            a.role,
										            if(b.id_pic2 is null, "no", "yes") active_pic
										        from users a
										        -- Cari yang lowong
										        left join 
										        (
										            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where role = "pic" and a.subbid_id = "32" 
										 ) a 
							             WHERE active_pic = "no"'));
							#dd("11");
							
							if ($check == null){
											#$subbid_id = DB::table('mstr_layanan')->where('id_layanan', $request->id_layanan)->value('subbid_id');
											#$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
											$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "32") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "yes"
												) a where sort_lowest_case = 1'));
													$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($check_pic);

										}
										
										elseif($check != null)
											{
												$check_pic = DB::select(DB::raw('select id as id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.role,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.role,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where role = "pic" and a.subbid_id = "32") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1"
												        ) y on x.subbid_id = y.subbid_id and x.id = y.id_pic3
												        group by 1,5  
												        ) a where active_pic = "no"
												) a where sort_lowest_case = 1'));	
												$ids = [];
												 foreach($check_pic as $value)
												{
												          $ids = $value->id;
												}
												#dd($ids);
											} 

									    	date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'id_layanan'        => $request->id_layanan,
									            'judul'        		=> $request->judul,
									            'id_pic'        	=> $ids,
									            'id_koor'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
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

									        $request->file('dokumen')->move('dokumen/', $request->file('dokumen')->getClientOriginalName());
									        $data_konsul_detail->dokumen 		= $request->file('dokumen')->getClientOriginalName();
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 
									        return redirect('/konsul_online'); 
			} 


    	}

    public function list_konsul_online()
	    {
	    	#\App\Models\tb_konsul_online::create($request->all());
	    	return view('users.user_list_konsulonline');
	    }
} 
