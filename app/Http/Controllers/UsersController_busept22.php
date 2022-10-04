<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendMail2;
use App\Mail\SendMail3;

class UsersController extends Controller
{
    public function konsul_online()
	    {
	    	$data_layanan = \App\Models\mstr_layanan::where('status', '1')
	    	->orderby('subbid_id', 'ASC')
	    	->get();
	    	return view('users.form_konsulonline',['data_layanan' => $data_layanan]);
	    }

    public function create_konsul(Request $request)
	    {
	    	$subbid_id = DB::table('mstr_layanan')->where('id', $request->layanan_id)->value('subbid_id');
	    	#return $subbid_id = $data_layanan->subbid_id;
	    	#$bidang_id = DB::table('mstr_layanan')->select('bidang_id')->where('id_layanan', $request->id_layanan)->first();
	    	$user_subkoor = DB::table('users')->where('mstr_role_id', '3')->where('subbid_id', $subbid_id)->value('id');
	    	$email_subkoor = DB::table('users')->where('mstr_role_id', '3')->where('subbid_id', $subbid_id)->value('email');
	    	// dd($email_subkoor);
	    	##KODE BELOW OK
	    	#$user_pic = DB::table('users')->where('role', 'pic')->where('subbid_id', $subbid_id)->value('id');
	    	#return $user_id = $user->name;
	    	#dd($request->id_layanan);
	    	#dd($user_pic,$user_subkoor);
	    	#$data_user = DB::table('tb_konsul_online')->where('id_layanan', $request->id_layanan)->groupBy('id_pic')->get();
	    	#dd($subbid_id);
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
										            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where mstr_role_id = "4" and a.subbid_id = "11" and is_active = "1"
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
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "11" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
												$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "11" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
											// dd($request->all());
											$kode = DB::table('tb_konsul_online')->max('id_konsul');
									    	// $addNol = '';
									    	// $kode = str_replace("KO", "", $kode);
									    	$kode = (int) $kode + 1;
									        $incrementKode = $kode;

									    	// if (strlen($kode) == 1) {
									    	// 	$addNol = "00000";
									    	// } elseif (strlen($kode) == 2) {
									    	// 	$addNol = "0000";
									    	// } elseif (strlen($kode == 3)) {
									    	// 	$addNol = "000";
									    	// } elseif (strlen($kode == 4)) {
									    	// 	$addNol = "00";
									    	// } elseif (strlen($kode == 5)) {
									    	// 	$addNol = "0";
									    	// }

									    	$kodeBaru = "KO".$subbid_id.$request->layanan_id.$incrementKode;
									    	// return $kodeBaru;
									    	// $email_admin = DB::table('users')->where('id', $ids)->value('email');

									    	// date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'layanan_id'        => $request->layanan_id,
									            'judul'        		=> $request->judul,
									            'pic_id'        	=> $ids,
									            'koor_id'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
									            'status_id'        	=> '1',
									            'created_at'		=> date('Y-m-d H:i:s'),
									            'updated_at'		=> date('Y-m-d H:i:s'),
									            'created_by'		=> $request->nama,
									            'no_tiket'			=> $kodeBaru
									        ]);

									    	// dd($request->dokumen);
									        $data_konsul_detail = new \App\Models\tb_konsul_detail;
									        $data_konsul_detail->konsul_id 		= $data_konsul;
									        $data_konsul_detail->no_tiket 		= $kodeBaru;
									        // $data_konsul_detail->dokumen 		= '';
									        $data_konsul_detail->created_by 	= $request->nama;

									        if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $kodeBaru."_".$file;
									        $data_konsul_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}
									        
									        // dd($request->details);
									        $storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_konsul_detail->details 		= $dom->saveHTML();

									        // $data_konsul_detail->details 		= $request->details;
									        // $data_konsul_detail->detail 		= 'detail';
									        // $data_konsul_detail->dokumen		= $request->dokumen;
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 

									        // $id_konsul2 = encrypt($data_konsul); 
									        $data = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru,
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									            'nama' => $request->nama,
									        ];
									        // dd($data);
									        Mail::to($request->email)->send(new SendMail($data));

									        $email_admin = DB::table('users')->where('id', $ids)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru.' Menunggu Respon PIC',
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									        ];
									        // // dd($data);
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));



									        return redirect()->action('App\Http\Controllers\UsersController@konsul_online')->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');
			}

			elseif ($subbid_id == "12")
	    	{
	    		// 			$checks = DB::table('users as a')
	    		// 			->selectraw('a.id,
							// 			            a.name,
							// 			            a.subbid_id,
							// 			            a.mstr_role_id,
							// 			            if(b.id_pic2 is null, "no", "yes") active_pic')
	    		// 			->leftjoin(DB::raw("(select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = '1') as b"),function($join){
							// $join->on('a.subbid_id','b.subbid_id');
							// $join->on('a.id','b.id_pic2');})
							// ->where('mstr_role_id', '4')
							// ->where('a.subbid_id', $subbid_id)
							// ->get();
	    		// 			// dd($checks);

	    		// 			$check2 = $checks
	    		// 			->where('active_pic' , 'no');
	    		// 			dd($check2);
							
							$check = DB::select(DB::raw('select * from
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
										            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where mstr_role_id = "4" and a.subbid_id = "12" and is_active = "1"
										 ) a 
							             WHERE active_pic = "no"'));
							// dd($check);
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
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "12" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
												$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "12" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
											// dd($request->all());
											$kode = DB::table('tb_konsul_online')->max('id_konsul');
									    	// $addNol = '';
									    	// $kode = str_replace("KO", "", $kode);
									    	$kode = (int) $kode + 1;
									        $incrementKode = $kode;

									    	// if (strlen($kode) == 1) {
									    	// 	$addNol = "00000";
									    	// } elseif (strlen($kode) == 2) {
									    	// 	$addNol = "0000";
									    	// } elseif (strlen($kode == 3)) {
									    	// 	$addNol = "000";
									    	// } elseif (strlen($kode == 4)) {
									    	// 	$addNol = "00";
									    	// } elseif (strlen($kode == 5)) {
									    	// 	$addNol = "0";
									    	// }

									    	$kodeBaru = "KO".$subbid_id.$request->layanan_id.$incrementKode;
									    	// return $kodeBaru;
									    

									    	// date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'layanan_id'        => $request->layanan_id,
									            'judul'        		=> $request->judul,
									            'pic_id'        	=> $ids,
									            'koor_id'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
									            'status_id'        	=> '1',
									            'created_at'		=> date('Y-m-d H:i:s'),
									            'updated_at'		=> date('Y-m-d H:i:s'),
									            'created_by'		=> $request->nama,
									            'no_tiket'			=> $kodeBaru
									        ]);

									    	// dd($request->dokumen);
									        $data_konsul_detail = new \App\Models\tb_konsul_detail;
									        $data_konsul_detail->konsul_id 		= $data_konsul;
									        $data_konsul_detail->no_tiket 		= $kodeBaru;
									        // $data_konsul_detail->dokumen 		= '';
									        $data_konsul_detail->created_by 	= $request->nama;

									        if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $kodeBaru."_".$file;
									        $data_konsul_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}
									        
									        // dd($request->details);
									        $storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_konsul_detail->details 		= $dom->saveHTML();

									        // $data_konsul_detail->details 		= $request->details;
									        // $data_konsul_detail->detail 		= 'detail';
									        // $data_konsul_detail->dokumen		= $request->dokumen;
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 

									         $data = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru,
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									            'nama' => $request->nama,
									        ];
									        // dd($data);
									        Mail::to($request->email)->send(new SendMail($data));

									        $email_admin = DB::table('users')->where('id', $ids)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru.' Menunggu Respon PIC',
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));

									        return redirect()->action('App\Http\Controllers\UsersController@konsul_online')->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');  
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
										            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where mstr_role_id = "4" and a.subbid_id = "21" and is_active = "1"
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
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "21" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
												$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "21" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
											// dd($request->all());
											$kode = DB::table('tb_konsul_online')->max('id_konsul');
									    	// $addNol = '';
									    	// $kode = str_replace("KO", "", $kode);
									    	$kode = (int) $kode + 1;
									        $incrementKode = $kode;

									    	// if (strlen($kode) == 1) {
									    	// 	$addNol = "00000";
									    	// } elseif (strlen($kode) == 2) {
									    	// 	$addNol = "0000";
									    	// } elseif (strlen($kode == 3)) {
									    	// 	$addNol = "000";
									    	// } elseif (strlen($kode == 4)) {
									    	// 	$addNol = "00";
									    	// } elseif (strlen($kode == 5)) {
									    	// 	$addNol = "0";
									    	// }

									    	$kodeBaru = "KO".$subbid_id.$request->layanan_id.$incrementKode;
									    	// return $kodeBaru;
									    

									    	// date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'layanan_id'        => $request->layanan_id,
									            'judul'        		=> $request->judul,
									            'pic_id'        	=> $ids,
									            'koor_id'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
									            'status_id'        	=> '1',
									            'created_at'		=> date('Y-m-d H:i:s'),
									            'updated_at'		=> date('Y-m-d H:i:s'),
									            'created_by'		=> $request->nama,
									            'no_tiket'			=> $kodeBaru
									        ]);

									    	// dd($request->dokumen);
									        $data_konsul_detail = new \App\Models\tb_konsul_detail;
									        $data_konsul_detail->konsul_id 		= $data_konsul;
									        $data_konsul_detail->no_tiket 		= $kodeBaru;
									        // $data_konsul_detail->dokumen 		= '';
									        $data_konsul_detail->created_by 	= $request->nama;

									        if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $kodeBaru."_".$file;
									        $data_konsul_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}
									        
									        // dd($request->details);
									        $storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_konsul_detail->details 		= $dom->saveHTML();

									        // $data_konsul_detail->details 		= $request->details;
									        // $data_konsul_detail->detail 		= 'detail';
									        // $data_konsul_detail->dokumen		= $request->dokumen;
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 

									         $data = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru,
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									            'nama' => $request->nama,
									        ];
									        // dd($data);
									        Mail::to($request->email)->send(new SendMail($data));

									        $email_admin = DB::table('users')->where('id', $ids)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru.' Menunggu Respon PIC',
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));

									        return redirect()->action('App\Http\Controllers\UsersController@konsul_online')->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');
			}


			if ($subbid_id == "22")
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
										            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where mstr_role_id = "4" and a.subbid_id = "22" and is_active = "1"
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
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "22" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
												$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "22" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
											// dd($request->all());
											$kode = DB::table('tb_konsul_online')->max('id_konsul');
									    	// $addNol = '';
									    	// $kode = str_replace("KO", "", $kode);
									    	$kode = (int) $kode + 1;
									        $incrementKode = $kode;

									    	// if (strlen($kode) == 1) {
									    	// 	$addNol = "00000";
									    	// } elseif (strlen($kode) == 2) {
									    	// 	$addNol = "0000";
									    	// } elseif (strlen($kode == 3)) {
									    	// 	$addNol = "000";
									    	// } elseif (strlen($kode == 4)) {
									    	// 	$addNol = "00";
									    	// } elseif (strlen($kode == 5)) {
									    	// 	$addNol = "0";
									    	// }

									    	$kodeBaru = "KO".$subbid_id.$request->layanan_id.$incrementKode;
									    	// return $kodeBaru;
									    

									    	// date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'layanan_id'        => $request->layanan_id,
									            'judul'        		=> $request->judul,
									            'pic_id'        	=> $ids,
									            'koor_id'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
									            'status_id'        	=> '1',
									            'created_at'		=> date('Y-m-d H:i:s'),
									            'updated_at'		=> date('Y-m-d H:i:s'),
									            'created_by'		=> $request->nama,
									            'no_tiket'			=> $kodeBaru
									        ]);

									    	// dd($request->dokumen);
									        $data_konsul_detail = new \App\Models\tb_konsul_detail;
									        $data_konsul_detail->konsul_id 		= $data_konsul;
									        $data_konsul_detail->no_tiket 		= $kodeBaru;
									        // $data_konsul_detail->dokumen 		= '';
									        $data_konsul_detail->created_by 	= $request->nama;

									        if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $kodeBaru."_".$file;
									        $data_konsul_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}
									        
									        // dd($request->details);
									        $storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_konsul_detail->details 		= $dom->saveHTML();

									        // $data_konsul_detail->details 		= $request->details;
									        // $data_konsul_detail->detail 		= 'detail';
									        // $data_konsul_detail->dokumen		= $request->dokumen;
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 

									         $data = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru,
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									            'nama' => $request->nama,
									        ];
									        // dd($data);
									        Mail::to($request->email)->send(new SendMail($data));

									        $email_admin = DB::table('users')->where('id', $ids)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru.' Menunggu Respon PIC',
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));

									        return redirect()->action('App\Http\Controllers\UsersController@konsul_online')->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.'); 
			}



			elseif ($subbid_id == "31")
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
										            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where mstr_role_id = "4" and a.subbid_id = "31" and is_active = "1"
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
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "31" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
												$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "31" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
											// dd($request->all());
											$kode = DB::table('tb_konsul_online')->max('id_konsul');
									    	// $addNol = '';
									    	// $kode = str_replace("KO", "", $kode);
									    	$kode = (int) $kode + 1;
									        $incrementKode = $kode;

									    	// if (strlen($kode) == 1) {
									    	// 	$addNol = "00000";
									    	// } elseif (strlen($kode) == 2) {
									    	// 	$addNol = "0000";
									    	// } elseif (strlen($kode == 3)) {
									    	// 	$addNol = "000";
									    	// } elseif (strlen($kode == 4)) {
									    	// 	$addNol = "00";
									    	// } elseif (strlen($kode == 5)) {
									    	// 	$addNol = "0";
									    	// }

									    	$kodeBaru = "KO".$subbid_id.$request->layanan_id.$incrementKode;
									    	// return $kodeBaru;
									    
									    	$email_admin = DB::table('users')->where('id', $ids)->value('email');
									        // dd($email_admin);
									    	// date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'layanan_id'        => $request->layanan_id,
									            'judul'        		=> $request->judul,
									            'pic_id'        	=> $ids,
									            'koor_id'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
									            'status_id'        	=> '1',
									            'created_at'		=> date('Y-m-d H:i:s'),
									            'updated_at'		=> date('Y-m-d H:i:s'),
									            'created_by'		=> $request->nama,
									            'no_tiket'			=> $kodeBaru
									        ]);

									    	// dd($request->dokumen);
									        $data_konsul_detail = new \App\Models\tb_konsul_detail;
									        $data_konsul_detail->konsul_id 		= $data_konsul;
									        $data_konsul_detail->no_tiket 		= $kodeBaru;
									        // $data_konsul_detail->dokumen 		= '';
									        $data_konsul_detail->created_by 	= $request->nama;

									        if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $kodeBaru."_".$file;
									        $data_konsul_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}
									        
									        // dd($request->details);
									        $storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_konsul_detail->details 		= $dom->saveHTML();

									        // $data_konsul_detail->details 		= $request->details;
									        // $data_konsul_detail->detail 		= 'detail';
									        // $data_konsul_detail->dokumen		= $request->dokumen;
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 

									         $data = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru,
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									            'nama' => $request->nama,
									        ];
									        // dd($data);
									        Mail::to($request->email)->send(new SendMail($data));

											$email_admin = DB::table('users')->where('id', $ids)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru.' Menunggu Respon PIC',
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));
									        
									        return redirect()->action('App\Http\Controllers\UsersController@konsul_online')->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');
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
										            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
										        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
										        where mstr_role_id = "4" and a.subbid_id = "32" and is_active = "1"
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
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "32" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
												$check_pic = DB::select(DB::raw('select id from(
												select
												        id, name, active_pic, num_cases, row_number() over(order by num_cases asc) sort_lowest_case, row_number() over(order by id asc) sort_pic
												    from 
												    (
												select
															x.id,
												            x.name,
												            x.subbid_id,
												            x.mstr_role_id,
												            x.active_pic,
												            count(distinct y.id_konsul) num_cases
												            from
												(select 
												            a.id,
												            a.name,
												            a.subbid_id,
												            a.mstr_role_id,
												            if(b.id_pic2 is null, "No", "Yes") active_pic
												        from users a
												        -- Cari yang lowong
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id = "1"
												        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
												        where mstr_role_id = "4" and a.subbid_id = "32" and is_active = "1") x
												      -- Cari case terbanyak
												        left join 
												        (
												            select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic3, status_id from tb_konsul_online where status_id = "1"
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
											// dd($request->all());
											$kode = DB::table('tb_konsul_online')->max('id_konsul');
									    	// $addNol = '';
									    	// $kode = str_replace("KO", "", $kode);
									    	$kode = (int) $kode + 1;
									        $incrementKode = $kode;

									    	// if (strlen($kode) == 1) {
									    	// 	$addNol = "00000";
									    	// } elseif (strlen($kode) == 2) {
									    	// 	$addNol = "0000";
									    	// } elseif (strlen($kode == 3)) {
									    	// 	$addNol = "000";
									    	// } elseif (strlen($kode == 4)) {
									    	// 	$addNol = "00";
									    	// } elseif (strlen($kode == 5)) {
									    	// 	$addNol = "0";
									    	// }

									    	$kodeBaru = "KO".$subbid_id.$request->layanan_id.$incrementKode;
									    	// return $kodeBaru;
									    
									    	$email_admin = DB::table('users')->where('id', $ids)->value('email');
									        // dd($email_admin);
									    	// date_default_timezone_set("Asia/Jakarta");
									    	$data_konsul = \App\Models\tb_konsul_online::insertGetId([
									            'nama'  			=> $request->nama,
									            'jabatan'         	=> $request->jabatan,
									            'unit_kerja'    	=> $request->unit_kerja,
									            'no_hp'        		=> $request->no_hp,
									            'email'        		=> $request->email,
									            'layanan_id'        => $request->layanan_id,
									            'judul'        		=> $request->judul,
									            'pic_id'        	=> $ids,
									            'koor_id'        	=> $user_subkoor,
									            'subbid_id'			=> $subbid_id,
									            'status_id'        	=> '1',
									            'created_at'		=> date('Y-m-d H:i:s'),
									            'updated_at'		=> date('Y-m-d H:i:s'),
									            'created_by'		=> $request->nama,
									            'no_tiket'			=> $kodeBaru
									        ]);

									    	// dd($request->dokumen);
									        $data_konsul_detail = new \App\Models\tb_konsul_detail;
									        $data_konsul_detail->konsul_id 		= $data_konsul;
									        $data_konsul_detail->no_tiket 		= $kodeBaru;
									        // $data_konsul_detail->dokumen 		= '';
									        $data_konsul_detail->created_by 	= $request->nama;

									        if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $kodeBaru."_".$file;
									        $data_konsul_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}
									        
									        // dd($request->details);
									        $storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_konsul_detail->details 		= $dom->saveHTML();

									        // $data_konsul_detail->details 		= $request->details;
									        // $data_konsul_detail->detail 		= 'detail';
									        // $data_konsul_detail->dokumen		= $request->dokumen;
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 

									         $data = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru,
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									            'nama' => $request->nama,
									        ];
									        // dd($data);
									        Mail::to($request->email)->send(new SendMail($data));

											$email_admin = DB::table('users')->where('id', $ids)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$kodeBaru.' Menunggu Respon PIC',
									            'id_konsul' => $data_konsul,
									            'no_tiket' => $kodeBaru,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));
									        
									        return redirect()->action('App\Http\Controllers\UsersController@konsul_online')->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');
			} 
    	}

    public function list_konsul_online()
	    {
	    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');}) 
	      	->select('id_konsul','no_tiket','nama','jabatan','unit_kerja','jenis_layanan','judul','nama_status','tb_konsul_online.created_at as created_at',)
	      	->orderby('status_id', 'ASC')
	      	#->where('tb_konsul_online.id_status','5')
	    	->get();
	    		return view('users.user_list_konsulonline')->with(['data_konsul_online' => $data_konsul_online]);
	    }

	public function respon_konsulonline($id_konsul)
    {
    	$id_konsul=decrypt($id_konsul);
    	// date_default_timezone_set("Asia/Jakarta");
    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
    		->select('id_konsul', 'no_tiket', 'nama', 'unit_kerja', 'jabatan', 'jenis_layanan','judul','tb_konsul_online.created_at as created_at', 'status_id', 'pic_id', 'koor_id')
				->where('tb_konsul_online.id_konsul' , $id_konsul)
	    	->get();
	    	// dd($data_konsul_online);

    	$data_konsul_detail = \App\Models\tb_konsul_online::leftjoin('tb_konsul_detail', function($join) {
	      $join->on('tb_konsul_online.id_konsul', '=', 'tb_konsul_detail.konsul_id');}) 
    	->leftjoin('users', function($join3) {
	      $join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
	    	->leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      ->select('tb_konsul_online.id_konsul', 'tb_konsul_online.no_tiket', 'tb_konsul_detail.created_at as created_at', 'tb_konsul_detail.created_by as created_by','details','dokumen', 'is_answered', 'users.id as user_id', 'jenis_layanan', 'tb_konsul_detail.updated_at as updated_at', 'tb_konsul_online.status_id')
			->where('tb_konsul_detail.konsul_id' , $id_konsul)
			->where('tb_konsul_detail.is_answered' , '!=' ,'1')
	    	->get();

    	// dd($data_konsul_detail); 
    	return view('users.DetailKonsulOnline')->with(['data_konsul_online' => $data_konsul_online])->with(['data_konsul_detail' => $data_konsul_detail]);
    }


    public function closed_konsulonline($id_konsul,Request $request)
    {
    	$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
	    $konsul_online->status_id = '4';
	    $konsul_online->save();

	    // $id_detail = $request->id_detail;
	    // $konsul_online = \App\Models\tb_konsul_detail::find($id_detail);
	    // $konsul_online->is_answered = '2';
	    // $konsul_online->save();

		// return redirect('list_konsul_online')->with('sukses', 'Case Closed!');
		return redirect()->action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($id_konsul)])->with('sukses', 'Case Closed!');
    	#dd($request->id_detail);
    }


    public function reply_konsulonline($id_konsul, Request $request)
    {
    	// date_default_timezone_set("Asia/Jakarta"); 
    	// dd($request->all());
    	$mytime = Carbon::now();
    	// dd($request->file('dokumen'));
		// DB::table('tb_konsul_online')
  //               ->where('id_konsul', $request->id_konsul)
  //               ->update(['id_status' => '2'],
  //               	['updated_date' => date('Y-m-d H:i:s')]);

		// use App\Models;
		$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
	    $konsul_online->status_id = '1';
	    $konsul_online->save();

        // $user_id = Auth::user()->name;
    	$data_detail = new \App\Models\tb_konsul_detail;
		$data_detail->konsul_id = $request->id_konsul;
		$data_detail->no_tiket = $request->no_tiket;

		if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $request->no_tiket."_".$file;
									        $data_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}

		$storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_detail->details 		= $dom->saveHTML();
		// $data_detail->details = $request->details;
		
		$data_detail->is_answered = '0';
		$data_detail->created_by 	= $request->nama;
		$data_detail->created_at 	= date('Y-m-d H:i:s');
		$data_detail->updated_at 	= date('Y-m-d H:i:s');
		$data_detail->save();     

		$email_subkoor = DB::table('users')->where('id', $request->koor_id)->value('email');
		$email_admin = DB::table('users')->where('id', $request->pic_id)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$request->no_tiket.' Menunggu Respon PIC',
									            'id_konsul' => $request->id_konsul,
									            'no_tiket' => $request->no_tiket,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));

		// return redirect('/list_konsul_online')->with('sukses', 'Respon Berhasil di Submit!');
		return redirect()->action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($id_konsul)])->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');
    	#dd($request); 
    }

    public function ask_konsulonline($id_konsul, Request $request)
    {	
    	// dd($id_konsul);
    	// date_default_timezone_set("Asia/Jakarta");
    	$mytime = Carbon::now();
    	// dd($request->file('dokumen'));
		// DB::table('tb_konsul_online')
  //               ->where('id_konsul', $request->id_konsul)
  //               ->update(['id_status' => '2'],
  //               	['updated_date' => date('Y-m-d H:i:s')]);
    	// dd($request->all());
		// use App\Models;
		$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
	    $konsul_online->status_id = '1';
	    $konsul_online->save();

        // $user_id = Auth::user()->name;
    	$data_detail = new \App\Models\tb_konsul_detail;
		$data_detail->konsul_id = $request->id_konsul;
		$data_detail->no_tiket = $request->no_tiket;

		if($request->dokumen != null){
									        $file = $request->file('dokumen')->getClientOriginalName();
									        $nama_file = $request->no_tiket."_".$file;
									        $data_detail->dokumen 		= $nama_file;
									    $request->file('dokumen')->move(public_path('dokumen/'), $nama_file);}

		$storage = "dokumen";
									        $dom = new \DOMDocument();
									        libxml_use_internal_errors(true);
									        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
									        libxml_clear_errors();
									        // dd($dom->getElementsByTagName('img'));
									        $images=$dom->getElementsByTagName('img');
									        foreach($images as $img){
									        	$src=$img->getAttribute('src');
									        	if(preg_match('/data:image/', $src)){
									        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
									        		$mimetype=$groups['mime'];
									        		$fileNameContent=uniqid();
									        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
									        		$filepath=("$storage/$fileNameContentRand.$mimetype");
									        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
									        		$new_src=asset($filepath);
									        		$img->removeAttribute('src');
									        		$img->setAttribute('src',$new_src);
									        		$img->setAttribute('class','img-responsive');
									        	}
									        }
									        $data_detail->details 		= $dom->saveHTML();
		// $data_detail->details = $request->details;
		
		$data_detail->is_answered = '0';
		$data_detail->created_by 	= $request->nama;
		$data_detail->created_at 	= date('Y-m-d H:i:s');
		$data_detail->updated_at 	= date('Y-m-d H:i:s');
		$data_detail->save();     

		$email_subkoor = DB::table('users')->where('id', $request->koor_id)->value('email');
		$email_admin = DB::table('users')->where('id', $request->pic_id)->value('email');
									        $data2 = [
									            'title' => 'Konsultasi Online Tiket #'.$request->no_tiket.' Menunggu Respon PIC',
									            'id_konsul' => $request->id_konsul,
									            'no_tiket' => $request->no_tiket,
									        ];
									        // // dd($data);					        
									        $emails = [$email_admin, $email_subkoor];					        
									        Mail::to($emails)->send(new SendMail2($data2));

		// return redirect('/list_konsul_online')->with('sukses', 'Respon Berhasil di Submit!');
		return redirect()->action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($id_konsul)])->with('sukses', 'Terima kasih, pertanyaan anda telah terkirim. Selanjutnya periksa email yang anda isikan untuk memantau progres jawaban dari Pusbin JFA.');
    	#dd($request);
    }

    public function pengaduan()
	    {
	    	return view('users.FormPengaduan');
	    }

	public function store_rating($id_konsul, Request $request){
    	// dd($request->all());

    	// $id_konsul=decrypt($id_konsul);
		$post = New \App\Models\rating;
		$post->id_konsul = $request->id_konsul;
		$post->no_tiket = $request->no_tiket;
		$post->rating = $request->ratting;
		$post->ulasan = $request->ulasan;
		$post->save();

		$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
        $konsul_online->status_id = '4';
        $konsul_online->save();

		return redirect()->action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($id_konsul)])->with('sukses', 'Terima kasih, ulasan anda telah terkirim.');
	}


	   
} 
