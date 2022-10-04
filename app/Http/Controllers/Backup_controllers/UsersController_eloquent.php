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
			$user_subkoor = DB::table('users')->where('role', 'subkoordinator')->where('subbid_id', $subbid_id)->value('id');
			#$test = DB::table('tb_konsul_online')->where('id_status','1')->get();
	
			// $users = DB::table('users')->get();
			// dd($users);


		 // $test1 = DB::table('users')
   //       ->select(
         			
   //       			'users.id',
   //       			'users.subbid_id',
   //       			'users.name',
   //       			'role',
   //       			'test.id_pic',
   //       			DB::raw("(CASE WHEN test.id_pic IS NULL THEN 'no' ELSE 'Yes' END) as active_pic")
   //       		 )
   //       ->leftjoin(DB::raw('(SELECT 
   //      						id_konsul, nama, subbid_id, id_layanan, judul, id_pic, id_status
			// 			 FROM   tb_konsul_online
			// 			WHERE   id_status = 1
			// 			)
   //             test'), 
   //      function($join)
   //      {
   //         $join->on('users.subbid_id', '=', 'test.subbid_id')
   //         		->on('users.id','=','test.id_pic');
   //      })
   //      -> where('role','pic')
   //      -> where('users.subbid_id',$subbid_id)
   //      ->groupBy('users.id')
   //      ->get();

		// $kode = \App\Models\tb_konsul_online::kode();
	 //    #dd($kode);

        $test1 = DB::table('users')
		         ->select(
		         			
		         			'users.id',
		         			'users.subbid_id',
		         			'users.name',
		         			'role',
		         			'test.id_pic',
		         			DB::raw("(CASE WHEN test.id_pic IS NULL THEN 'no' ELSE 'yes' END) as active_pic")
		         		 )
		         ->leftjoin(DB::raw('(SELECT 
		        						id_konsul, nama, subbid_id, id_layanan, judul, id_pic, id_status
								 FROM   tb_konsul_online
								WHERE   id_status = 1
								)
		               test'), 
		        function($join)
		        {
		           $join->on('users.subbid_id', '=', 'test.subbid_id')
		           		->on('users.id','=','test.id_pic');
		        })
		        -> where('role','pic')
		        -> where('users.subbid_id',$subbid_id) 
		        ->groupBy('users.id')
		        #->whereraw('active_pic','yes')
		        ->get();
      
     $query = $test1->where('active_pic' , 'no');
      #$query = DB::selectwhereExists(function($query)
        		dd($query); 

	    	/*
	    				$subbid_id = \DB::table('mstr_layanan')
								    ->where('id_layanan', $request->id_layanan)
								    ->value('subbid_id');
								    #->toSql();
									#->getBindings();
								  # dd($subbid_id);

						$q = \DB::table(\DB::raw('('.$subbid_id->toSql().') as a'))
						   	->selectRaw('a.id,
										            a.name,
										            a.subbid_id,
										            a.role,
										            if(b.id_pic2 is null, "no", "yes") active_pic')
						    ->leftjoin('users as a', 'a.subbid_id', '=', 'b.subbid_id' , '&&' , 'a.id', '=', 'b.id_pic2')
						    ->mergeBindings($subbid_id)
						    ->get();

						 dd($q);
						

*/
				

							// $check = DB::select(DB::raw('select a.active_pic from
							// 			(select DISTINCT
							// 			            a.id,
							// 			            a.name,
							// 			            a.subbid_id,
							// 			            a.role,
							// 			            if(b.id_pic2 is null, "no", "yes") active_pic
							// 			        from users a
							// 			        -- Cari yang lowong
							// 			        left join 
							// 			        (
							// 			            select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic2, id_status from tb_konsul_online where id_status = "1"
							// 			        ) b on a.subbid_id = b.subbid_id and a.id = b.id_pic2
							// 			        where role = "pic" and a.subbid_id = $subbid_id 
							// 			 ) a 
							//              WHERE active_pic = "no"'));
							// dd($check); 
							

$test2 = DB::table('users') 
		         ->select(
		         			
		         			'users.id',
		         			'users.subbid_id',
		         			'users.name',
		         			'role',
		         			'test.id_pic',
		         			DB::raw("(CASE WHEN test.id_pic IS NULL THEN 'no' ELSE 'yes' END) as active_pic"),
		         			DB::raw("(count(distinct test2.id_konsul)) as num_cases")
		         			#DB::raw("(row_number() over(order by id asc) as sort_pic)")
		         			#DB::raw("(row_number() over(order by count(distinct test2.id_konsul) asc) as sort_lowest_case)")
		         		 )
		         ->leftjoin(DB::raw('(SELECT 
		        						id_konsul, nama, subbid_id, id_layanan, judul, id_pic, id_status
								 FROM   tb_konsul_online
								WHERE   id_status = 1
								)
		               test'), 
		        function($join)
		        {
		           $join->on('users.subbid_id', '=', 'test.subbid_id')
		           		->on('users.id','=','test.id_pic');
		        })
		        -> where('role','pic')
		        -> where('users.subbid_id',$subbid_id) 
		        ->groupBy('users.id')

		        ->leftjoin(DB::raw('(select id_konsul, nama, subbid_id, id_layanan, judul, id_pic id_pic3, id_status from tb_konsul_online where id_status = "1")
		               test2'), 
		        function($join2)
		        {
		           $join2->on('users.subbid_id', '=', 'test2.subbid_id')
		           		->on('users.id','=','test2.id_pic3');
		        })
		        #->where('active_pic','yes')
		        ->groupBy('users.id')
		        ->groupBy('active_pic')
		        ->orderby('num_cases','asc')
		        #->orderby('id')
		        #->where(min('id'))
		        ->get();
				dd($test2);


					/*
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
									        $data_konsul_detail->created_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->updated_at 	= date('Y-m-d H:i:s');
									        $data_konsul_detail->is_answered 	= '0';
									        $data_konsul_detail->save(); 
									        return redirect('/konsul_online'); */

    	}

    public function list_konsul_online()
	    {
	    	#\App\Models\tb_konsul_online::create($request->all());
	    	return view('users.user_list_konsulonline');
	    }
} 
