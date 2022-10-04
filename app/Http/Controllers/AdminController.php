<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail3;
use App\Mail\SendMail4;
use App\Mail\SendMail2;
use App\Mail\SendMail5;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{
	public function dashboard()
    {	
    	$active = 'dashboard';
    	date_default_timezone_set("Asia/Jakarta");
        $mytime = Carbon::now()->format('d M Y');
        $data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
          $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
            ->selectraw('jenis_layanan, count(tb_konsul_online.id_konsul) as jumlah')
            ->groupby('jenis_layanan')
            ->get();
            #dd($mytime);
        // $data_konsul = DB::table('tb_konsul_online')
        // 	->select('created_at',DB::raw('count(id_konsul) as jumlah'), DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) monthname'))
        //     ->groupBy(DB::raw('month'))
        //     ->get();
        // // dd($data_konsul);

        // $categories = [];
        // foreach($data_konsul as $dk){
        // 	$categories[] = $dk->monthname;
        // }
        // // dd($categories);
        // $series = [];
        // foreach($data_konsul_online as $dko){
        // 	$series[] = $dko->jenis_layanan;
        // }
        // $jumlah = [];
        // foreach($data_konsul_online as $dko){
        // 	$jumlah[] = $dko->jumlah;
        // }
        // dd($categories);

        // return view('Admins.homepage')->with(['mytime' => $mytime])->with(['data_konsul_online' => $data_konsul_online])->with(['active' => $active]);

        return view('admin.dashboard2')->with(['mytime' => $mytime])->with(['data_konsul_online' => $data_konsul_online])->with(['active' => $active]);
    }

    public function list_konsulonline()
    {
    	$active = 'all';
    	if(request()->session()->get('level') == "1")
    	{
	    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');}) 
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at')
	      	->orderby('status_id', 'ASC')
	      	#->where('tb_konsul_online.id_status','5')
	    	->get();
	    	// dd($data_konsul_online);
	    	#dd('Admin');
    	}
    	elseif (request()->session()->get('level') == "2"){
    		$subbid = request()->session()->get('subbid');
    		$bidang = request()->session()->get('bidang');
    		#dd($id_admin);
    		$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');}) 
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at')
	      	->where(\DB::raw('left(tb_konsul_online.subbid_id, 1)'), '=' , $bidang)
	      	->orderby('status_id', 'ASC')
			#->where('tb_konsul_online.id_status','5')
	    	->get();
	    	// dd($data_konsul_online);
    		#dd('bukan admin');
    	}
    	elseif (request()->session()->get('level') == "3"){
    		$subbid = request()->session()->get('subbid');
    		$bidang = request()->session()->get('bidang');
    		#dd($id_admin);
    		$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');}) 
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at')
	      	->where('tb_konsul_online.subbid_id' , $subbid)
	      	->orderby('status_id', 'ASC')
			#->where('tb_konsul_online.id_status','5')
	    	->get();
    		#dd('bukan admin');
    	}
    	else{
    		$id_admin = request()->session()->get('user_id');
    		#dd($id_admin);
    		$subbid = request()->session()->get('subbid');
    		$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');}) 
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at')
	      	->where('tb_konsul_online.subbid_id' , $subbid)
	      	->orderby('status_id', 'ASC')
				#->where('tb_konsul_online.id_status','=' ,'2')
		    	->get();
    		#dd('bukan admin');
    	}
    	/*
    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
      $join->on('tb_konsul_online.id_layanan', '=', 'mstr_layanan.id_layanan');})
      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.id_status', '=', 'mstr_status.id_status');}) 
		->orderBy('tb_konsul_online.id_status')
    	->get();
    	*/
    	return view('admin.list_konsulonline_all2')->with('data_konsul_online' , $data_konsul_online)
    	->with('active' , $active);
    	

    }


    public function list_konsulonline_open()
    {
    	$active = 'open';
    	if(request()->session()->get('level') == "1")
    	{
	    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');}) 
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at', 'mstr_role_id', 'status_id', 'pic_id', 'koor_id','tb_konsul_online.updated_at as updated_at')
			->where('tb_konsul_online.status_id','!=' ,'4')
			->orderby('status_id', 'ASC')
	    	->get();
	    	#dd('Admin');
	    	// dd($data_konsul_online);
    	}
    	elseif (request()->session()->get('level') == "2"){
    		$bidang = request()->session()->get('bidang');
    		$subbid = request()->session()->get('subbid');
    		#dd($id_admin);
    		$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at', 'mstr_role_id', 'status_id', 'pic_id', 'koor_id','tb_konsul_online.updated_at as updated_at')
	      	->where('mstr_layanan.bidang_id' , $bidang)
	      	// ->where('tb_konsul_online.subbid_id' , $subbid)
			->where('tb_konsul_online.status_id','!=' ,'4')
			->orderby('status_id', 'ASC')
	    	->get();
    		#dd('bukan admin');
    	}
    	elseif (request()->session()->get('level') == "3"){
    		$bidang = request()->session()->get('bidang');
    		$subbid = request()->session()->get('subbid');
    		#dd($id_admin);
    		$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at', 'mstr_role_id', 'status_id', 'pic_id', 'koor_id','tb_konsul_online.updated_at as updated_at')
	      	->where('tb_konsul_online.subbid_id' , $subbid)
			->where('tb_konsul_online.status_id','!=' ,'4')
			->orderby('status_id', 'ASC')
	    	->get();
    		#dd('bukan admin');
    		// dd($data_konsul_online);
    	}
    	else{
    		$id_admin = request()->session()->get('user_id');
    		#dd($id_admin);
    		$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
	      $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.status_id', '=', 'mstr_status.id');}) 
	      	->leftjoin('users', function($join3) {$join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
	      	->select('id_konsul','no_tiket', 'nama','jabatan','unit_kerja','jenis_layanan','judul','name','nama_status','tb_konsul_online.created_at as created_at', 'mstr_role_id', 'status_id', 'pic_id', 'koor_id','tb_konsul_online.updated_at as updated_at')
		      	->where('tb_konsul_online.pic_id' , $id_admin)
				->where('tb_konsul_online.status_id','!=' ,'4')
				->orderby('status_id', 'ASC')
		    	->get();
    		#dd('bukan admin');
    	}
    	/*
    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
      $join->on('tb_konsul_online.id_layanan', '=', 'mstr_layanan.id_layanan');})
      	->leftjoin('mstr_status', function($join2) {$join2->on('tb_konsul_online.id_status', '=', 'mstr_status.id_status');}) 
		->orderBy('tb_konsul_online.id_status')
    	->get();
    	*/
    	$data_layanan = \App\Models\mstr_layanan::all();
    	return view('admin.list_konsulonline2')->with(['data_layanan' => $data_layanan])->with(['data_konsul_online' => $data_konsul_online])->with(['active' => $active]);
    }


    public function view_konsulonline($id_konsul)
    {
    	$active = 'all';
    	$id_konsul=decrypt($id_konsul);
    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
    		->select('id_konsul', 'no_tiket', 'nama', 'unit_kerja', 'jabatan', 'jenis_layanan','judul','tb_konsul_online.created_at as created_at')
				->where('tb_konsul_online.id_konsul' , $id_konsul)
	    	->get();

        $datarating = \App\Models\tb_konsul_online::leftjoin('tb_rating', function($join2) {
          $join2->on('tb_konsul_online.id_konsul', '=', 'tb_rating.id_konsul');})
            ->select('tb_konsul_online.id_konsul', 'tb_konsul_online.no_tiket', 'tb_konsul_online.status_id' ,'tb_rating.rating', 'tb_rating.ulasan', 'tb_rating.created_at as created_at')
                ->where('tb_konsul_online.id_konsul' , $id_konsul)
            ->get();

        // dd($datarating);

	    // dd($data_konsul_online);
    	$data_konsul_detail = \App\Models\tb_konsul_online::leftjoin('tb_konsul_detail', function($join) {
	      $join->on('tb_konsul_online.id_konsul', '=', 'tb_konsul_detail.konsul_id');}) 
    	->leftjoin('users', function($join3) {
	      $join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
	    	->leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      ->select('tb_konsul_online.id_konsul', 'tb_konsul_online.no_tiket', 'tb_konsul_detail.created_at as created_at', 'tb_konsul_detail.created_by as created_by','details','dokumen', 'is_answered', 'users.id as user_id', 'jenis_layanan', 'tb_konsul_detail.updated_at as updated_at')
			->where('tb_konsul_detail.konsul_id' , $id_konsul)
	    	->get();

    	#dd($data_konsul_online); 
    	return view('admin.view2_konsulonline')->with(['data_konsul_online' => $data_konsul_online])->with(['data_konsul_detail' => $data_konsul_detail])->with(['datarating' => $datarating])->with(['active' => $active]);
    }


    public function respon_konsulonline($id_konsul)
    {
    	$active = 'open';
    	$id_konsul=decrypt($id_konsul);
    	// date_default_timezone_set("Asia/Jakarta");
    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
    	->leftjoin('users', function($join3) {
	      $join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
    	->select('id_konsul', 'no_tiket', 'nama', 'unit_kerja', 'jabatan', 'jenis_layanan','judul','tb_konsul_online.created_at as created_at', 'mstr_role_id', 'status_id', 'name', 'users.id as user_id', 'koor_id', 'tb_konsul_online.email as email_user')
			->where('tb_konsul_online.id_konsul' , $id_konsul)
	    	->get();

    	$data_konsul_detail = \App\Models\tb_konsul_online::leftjoin('tb_konsul_detail', function($join) {
	      $join->on('tb_konsul_online.id_konsul', '=', 'tb_konsul_detail.konsul_id');}) 
    		->leftjoin('users', function($join3) {
	      $join3->on('tb_konsul_online.pic_id', '=', 'users.id');})
	    	->leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
	      ->select('id_detail','tb_konsul_online.id_konsul', 'tb_konsul_online.no_tiket', 'tb_konsul_detail.created_at as created_at', 'tb_konsul_detail.created_by as created_by','details','dokumen', 'is_answered', 'users.id as user_id', 'jenis_layanan')
				->where('tb_konsul_detail.konsul_id' , $id_konsul)
	    	->get();

    	// dd($data_konsul_detail); 
    	return view('admin.respon2_konsulonline')->with(['data_konsul_online' => $data_konsul_online])->with(['data_konsul_detail' => $data_konsul_detail])->with(['active' => $active]);
    }

// CODE UNTUK UPDATE
    public function reply_konsulonline($id_konsul, Request $request)
    {
    	// dd($request->all());
    	$active = 'open';
    	// dd($request->email_user);
    	$email_subkoor = DB::table('users')->where('id', $request->koor_id)->value('email');
    	// dd($email_subkoor);
    	$mytime = Carbon::now();


    	// CEK PIC
    	$pic = DB::table('tb_konsul_online')->where('id_konsul', $id_konsul)->value('pic_id');
    	// dd($pic);
    	if ($pic == request()->session()->get('user_id')) {
    		// dd('PIC SAMA');
    	}
    	else{
    		return redirect()->action('App\Http\Controllers\AdminController@list_konsulonline_open')->with(['active' => $active])->with('failed', 'Anda bukan PIC pada konsultasi terkait. Silakan periksa kembali list konsultasi anda.');
    	}


		if ($request->has('is_answered')) {
		// DB::table('tb_konsul_online')
  //               ->where('id_konsul', $request->id_konsul)
  //               ->update(['id_status' => '2'],
  //               	['updated_date' => date('Y-m-d H:i:s')]);

			$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
	    $konsul_online->status_id = '2';
	    $konsul_online->save();
        
        $user_id = request()->session()->get('username');
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
		
		$data_detail->is_answered = $request->is_answered;
		$data_detail->created_by 	= $user_id;
		$data_detail->created_at 	= date('Y-m-d H:i:s');
		$data_detail->updated_at 	= date('Y-m-d H:i:s');
		$data_detail->save();  

			$data3 = [
					'title' => 'Konsultasi Online Tiket #'.$request->no_tiket.' Menunggu Approval',
					'id_konsul' => $request->id_konsul,
					'no_tiket' => $request->no_tiket,
					];
									        // dd($data);
					Mail::to($email_subkoor)->send(new SendMail3($data3));   
        }

        #TIDAK FORWARD ATASAN
        else {
        $konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
        $konsul_online->status_id = '0';
        $konsul_online->save();    

        $user_id = request()->session()->get('username');
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
		$data_detail->created_by 	= $user_id;
		$data_detail->created_at 	= date('Y-m-d H:i:s');
		$data_detail->updated_at 	= date('Y-m-d H:i:s');
		$data_detail->save();

			$data3 = [
					'title' => 'Respon Terkait Konsultasi Online Tiket #'.$request->no_tiket,
					'id_konsul' => $request->id_konsul,
					'no_tiket' => $request->no_tiket,
					'nama' => $request->nama,
					];
									        // dd($data);
					Mail::to($request->email_user)->send(new SendMail5($data3));
        }


		// return redirect('/admin_konsul_online')->with('sukses', 'Jawaban Berhasil di Submit!');
		return redirect()->action('App\Http\Controllers\AdminController@list_konsulonline_open')->with(['active' => $active])->with('sukses', 'Jawaban Berhasil di Submit!');
    	#dd($request);
    }


    public function approve_konsulonline($id_konsul,Request $request)
    {
    	$active = 'open';
    	// dd($request->all()); 
    	$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
	    $konsul_online->status_id = '3';
	    $konsul_online->save();

		// date_default_timezone_set("Asia/Jakarta");
  //   	$mytime = Carbon::now();
		// DB::table('tb_konsul_online')
  //               ->where('id_konsul', $request->id_konsul)
  //               ->update(['id_status' => '3'],
  //           			['updated_at' => now()]);

	    $id_detail = $request->id_detail;
	    $konsul_online = \App\Models\tb_konsul_detail::find($id_detail);
	    $konsul_online->is_answered = '2';
	    $konsul_online->save();

	    $data3 = [
					'title' => 'Respon Terkait Konsultasi Online Tiket #'.$request->no_tiket,
					'id_konsul' => $request->id_konsul,
					'no_tiket' => $request->no_tiket,
					'nama' => $request->nama,
					];
									        // dd($data);
					Mail::to($request->email_user)->send(new SendMail4($data3));

        // DB::table('tb_konsul_detail')
        //         ->where('id_detail', $request->id_detail)
        //         ->update(['is_answered' => '0'],
        //     			['updated_at' => now()]);

		// return redirect('/admin_konsul_online')->with('sukses', 'Jawaban Berhasil di Approve!');
		return redirect()->action('App\Http\Controllers\AdminController@list_konsulonline_open')->with(['active' => $active])->with('sukses', 'Jawaban Berhasil di Approve!');
    	#dd($request->id_detail);
    }


    public function close_konsulonline($id_konsul,Request $request)
    {
        $active = 'open';
        $id_konsul=decrypt($id_konsul);
        // date_default_timezone_set("Asia/Jakarta");
        // $data_status = DB::table('mstr_status')->get();
        // dd($data_status);

        $data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join2) {
          $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
                ->where('tb_konsul_online.id_konsul' , $id_konsul)
            ->get();

        return view('admin.ChangeStatusKonsultasi')->with(['data_konsul_online' => $data_konsul_online])->with(['active' => $active]);
        #dd($request->id_detail);
    }

    public function close_proses($id_konsul,Request $request)
    {
        $active = 'open';
        $user_id = request()->session()->get('username');
        // dd($no_tiket);
        // dd($request->all());
        $konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
        $konsul_online->status_id = '4';
        $konsul_online->save();

        $data_detail = new \App\Models\tb_konsul_detail;
                    $data_detail->konsul_id = $request->id_konsul;
                    $data_detail->no_tiket = $request->no_tiket;
                    $data_detail->details       = 'Layanan konsultasi di-close karena : '.$request->details;
                    $data_detail->is_answered = '1';
                    $data_detail->created_by    = $user_id;
                    $data_detail->created_at    = date('Y-m-d H:i:s');
                    $data_detail->updated_at    = date('Y-m-d H:i:s');
                    $data_detail->save();


        // return redirect('/admin_konsul_online')->with('sukses', 'Jawaban Berhasil di Approve!');
        return redirect()->action('App\Http\Controllers\AdminController@list_konsulonline_open')->with(['active' => $active])->with('sukses', 'Status Konsultasi Berhasil diubah!');
        #dd($request->id_detail);
    }


    public function revisi_konsulonline($id_konsul, Request $request)
    {
    	$active = 'open';
    	// date_default_timezone_set("Asia/Jakarta");
    	// dd($request->dokumen);
    	$mytime = Carbon::now();
    	if ($request->has('is_delete')){
    		// dd('mau delete dokumen');
    		 $konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
			    $konsul_online->status_id = '3';
			    $konsul_online->save();

			    $user_id = request()->session()->get('username');
		    	$data_detail = new \App\Models\tb_konsul_detail;
					$data_detail->konsul_id = $request->id_konsul;
					$data_detail->no_tiket = $request->no_tiket;
					// $data_detail->dokumen 		= $request->dokumenold;
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
					$data_detail->is_answered = '3';
					$data_detail->created_by 	= $user_id;
					$data_detail->created_at 	= date('Y-m-d H:i:s');
					$data_detail->updated_at 	= date('Y-m-d H:i:s');
					$data_detail->save();
    	}
    	else{
			    	if($request->dokumen == null ) {
			    		// dd($request->dokumenold);
			    		// dd('ga hapus dokumen, pakai dokumen lama');
			    		$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
					    $konsul_online->status_id = '3';
					    $konsul_online->save();

					    $user_id = request()->session()->get('username');
				    	$data_detail = new \App\Models\tb_konsul_detail;
							$data_detail->konsul_id = $request->id_konsul;
							$data_detail->no_tiket = $request->no_tiket;
							$data_detail->dokumen 		= $request->dokumenold;
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
							$data_detail->is_answered = '3';
							$data_detail->created_by 	= $user_id;
							$data_detail->created_at 	= date('Y-m-d H:i:s');
							$data_detail->updated_at 	= date('Y-m-d H:i:s');
							$data_detail->save();
			    	}
			    	else{
			    		// dd($request->dokumen);
			    		// dd('ga hapus dokumen, pakai dokumen baru');
			    		$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
					    $konsul_online->status_id = '3';
					    $konsul_online->save();

					    $user_id = request()->session()->get('username');
				    	$data_detail = new \App\Models\tb_konsul_detail;
							$data_detail->konsul_id = $request->id_konsul;
							$data_detail->no_tiket = $request->no_tiket;
							$file = $request->file('dokumen')->getClientOriginalName();
							$nama_file = $request->no_tiket."_".$file;
							$data_detail->dokumen 		= $nama_file;
							$request->file('dokumen')->move(public_path('dokumen/'), $nama_file);
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
							$data_detail->is_answered = '3';
							$data_detail->created_by 	= $user_id;
							$data_detail->created_at 	= date('Y-m-d H:i:s');
							$data_detail->updated_at 	= date('Y-m-d H:i:s');
							$data_detail->save();
			    	}
    			}	
    	// $konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
	    // $konsul_online->status_id = '3';
	    // $konsul_online->save();

			// DB::table('tb_konsul_online')
		  //               ->where('id_konsul', $request->id_konsul)
		  //               ->update(['status_id' => '3'],
		  //           			['updated_date' => Carbon::now()]);

		  //       $user_id = Auth::user()->name;
		  //   	$data_detail = new \App\Models\tb_konsul_detail;
			// $data_detail->konsul_id = $request->id_konsul;
			// $data_detail->no_tiket = $request->no_tiket;

			// if($request->dokumen != null){
			// 							        $file = $request->file('dokumen')->getClientOriginalName();
			// 							        $nama_file = $request->no_tiket."_".$file;
			// 							        $data_detail->dokumen 		= $nama_file;
			// 							    $request->file('dokumen')->move('dokumen/', $nama_file);}

			// $storage = "dokumen";
			// 							        $dom = new \DOMDocument();
			// 							        libxml_use_internal_errors(true);
			// 							        $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
			// 							        libxml_clear_errors();
			// 							        // dd($dom->getElementsByTagName('img'));
			// 							        $images=$dom->getElementsByTagName('img');
			// 							        foreach($images as $img){
			// 							        	$src=$img->getAttribute('src');
			// 							        	if(preg_match('/data:image/', $src)){
			// 							        		preg_match('/data:image\/(?<mime>.*?)\;/', $src,$groups);
			// 							        		$mimetype=$groups['mime'];
			// 							        		$fileNameContent=uniqid();
			// 							        		$fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
			// 							        		$filepath=("$storage/$fileNameContentRand.$mimetype");
			// 							        		$image=Image::make($src)->resize(1000,1000)->encode($mimetype,100)->save(public_path($filepath));
			// 							        		$new_src=asset($filepath);
			// 							        		$img->removeAttribute('src');
			// 							        		$img->setAttribute('src',$new_src);
			// 							        		$img->setAttribute('class','img-responsive');
			// 							        	}
			// 							        }
			// 							        $data_detail->details 		= $dom->saveHTML();

			// $data_detail->is_answered = '3';
			// $data_detail->created_by 	= $user_id;
			// $data_detail->created_at 	= date('Y-m-d H:i:s');
			// $data_detail->updated_at 	= date('Y-m-d H:i:s');
			// $data_detail->save();
    	$data3 = [
					'title' => 'Respon Terkait Konsultasi Online Tiket #'.$request->no_tiket,
					'id_konsul' => $request->id_konsul,
					'no_tiket' => $request->no_tiket,
					'nama' => $request->nama,
					];
									        // dd($data);
					Mail::to($request->email_user)->send(new SendMail4($data3));
		// return redirect('/admin_konsul_online')->with('sukses', 'Jawaban Berhasil di Submit!');
		return redirect()->action('App\Http\Controllers\AdminController@list_konsulonline_open')->with(['active' => $active])->with('sukses', 'Jawaban Berhasil di Submit!');
    	#dd($request);
    }


    public function changepic($id_konsul)
    {
    	$active = 'open';
    	$id_konsul=decrypt($id_konsul);
    	// date_default_timezone_set("Asia/Jakarta");
    	$data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join2) {
	      $join2->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
				->where('tb_konsul_online.id_konsul' , $id_konsul)
	    	->get();

    	// dd($data_konsul_online); 
	    	$data_layanan = \App\Models\mstr_layanan::where('status', '1')->get();
	    	
	    	$data_history_pic = \App\Models\history_pic::leftjoin('mstr_layanan', function($join2) {
	      $join2->on('history_pic.layanan_id_lama', '=', 'mstr_layanan.id');})
	      ->leftjoin('users', function($join3) {
	      $join3->on('history_pic.pic_lama', '=', 'users.id');})
	      ->select('id_konsul', 'jenis_layanan', 'history_pic.created_at as created_at', 'history_pic.updated_at as updated_at', 'no_tiket', 'subbid_id_lama', 'layanan_id_lama', 'pic_lama', 'ket_pic', 'changed_by', 'name', 'users.id as user_id')
				->where('history_pic.id_konsul' , $id_konsul)
	    	->get();
	    	// dd($data_history_pic);

	    	$data_pic_lama = \App\Models\history_pic::leftjoin('users', function($join2) {
	      $join2->on('history_pic.pic_lama', '=', 'users.id');})
	      ->select('id_konsul', 'no_tiket', 'pic_lama', 'history_pic.created_at', 'name as names', 'users.id as user_id')
				->where('history_pic.id_konsul' , $id_konsul)
	    	->get();
	    	// dd($data_pic_lama);

	    	$data_changed_by = \App\Models\history_pic::leftjoin('users', function($join2) {
	      $join2->on('history_pic.changed_by', '=', 'users.id');})
	      ->select('pic_lama')
				->where('history_pic.id_konsul' , $id_konsul)
	    	->get();

    	return view('admin.changepic')->with(['data_layanan' => $data_layanan])->with(['data_konsul_online' => $data_konsul_online])->with(['data_history_pic' => $data_history_pic])->with(['data_pic_lama' => $data_pic_lama])->with(['data_changed_by' => $data_changed_by])->with(['active' => $active]);
    }

    public function fetch_pic (Request $request)
    {
    		$id_admin = request()->session()->get('user_id');
	     $select = $request->get('select');
	     $value = $request->get('value');
	     $dependent = $request->get('dependent');
	     $data2 = DB::table('mstr_layanan')
	     	 ->select('subbid_id')
	       ->where('id', $value)
	       ->first();
	       $subbid= $data2->subbid_id;
	     $data = DB::table('users')
	     	 ->where('subbid_id', $subbid)
	       ->where('id', '!=', $id_admin)
	       ->where('mstr_role_id','4')
	       ->where('is_active','1')
	       ->groupBy('id')
	       ->get();
	     $output = '<option value="">Select PIC</option>';
	     foreach($data as $row)
	     {
	      $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
	     }
	     echo $output;
    }

    public function changepic_proses ($id_konsul, Request $request)
    {
        // dd($request->all());
    	$active = 'open';
    	 $id_admin = request()->session()->get('user_id');

    	$data2 = DB::table('mstr_layanan')
	       ->where('id', $request->id_layanan_baru)
	       ->first();
	       // dd($data2);
	       $subbid_id_baru= $data2->subbid_id;

	     $data3 = DB::table('users')
	       ->where('subbid_id', $subbid_id_baru)
	       ->where('mstr_role_id', '3')
	       ->first();  
	       // dd($data3->id);
	    // dd($request->pic_id);

	    if($request->pic_id != null){

				    $konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
				    $konsul_online->pic_id = $request->pic_id;
				    $konsul_online->layanan_id = $request->id_layanan_baru;
				    $konsul_online->subbid_id = $subbid_id_baru;
				    $konsul_online->koor_id = $data3->id;
				    $konsul_online->save();

			    
			    	$data_detail = \App\Models\history_pic::create([
				            'id_konsul'  			=> $id_konsul,
				            'no_tiket'  			=> $request->no_tiket,
				            'subbid_id_lama'  => $request->subbid_id,
				            'layanan_id_lama'  			=> $request->layanan_id,
				            'pic_lama'  			=> $request->pic_id_lama,
				            'ket_pic'  			=> $request->ket_pic,
				            'changed_by'  			=> $id_admin,

				 	]);  

                    $email_subkoor = DB::table('users')->where('id', $data3->id)->value('email');
                    // dd($email_subkoor);
                    $email_admin = DB::table('users')->where('id', $request->pic_id)->value('email');
                                            $data2 = [
                                                'title' => 'Konsultasi Online Tiket #'.$request->no_tiket.' Menunggu Respon PIC',
                                                'id_konsul' => $request->id_konsul,
                                                'no_tiket' => $request->no_tiket,
                                            ];
                                            // // dd($data);                            
                                            $emails = [$email_admin, $email_subkoor];                           
                                            Mail::to($emails)->send(new SendMail2($data2));
    }
    elseif($request->pic_id == null){
    	// dd($subbid_id_baru);

    		$check = DB::table('users as a')
	    					->selectraw('a.id,
	    						id_pic2,
										            a.name,
										            a.subbid_id,
										            a.mstr_role_id,
										            if(b.id_pic2 is null, "no", "yes") active_pic')
	    					->leftjoin(DB::raw("(select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id != '4') as b"),function($join){
							$join->on('a.subbid_id','b.subbid_id');
							$join->on('a.id','b.id_pic2');})
	    				->where('id_pic2' ,  null)
							->where('mstr_role_id', '4')
							->where('a.subbid_id', $subbid_id_baru)
							->where('is_active', '1')
							->groupby('a.id')
							->orderby('id', 'ASC')
							// ->first();
							->get();
	    				// dd($check);

							if ($check->isEmpty()){
											$new_pic = \App\Models\user::leftjoin('tb_konsul_online', function($join2) {
									      $join2->on('users.id', '=', 'tb_konsul_online.pic_id');})
									    	->selectraw('users.id as new_pic, count(tb_konsul_online.id_konsul) as jumlah')
												->where('tb_konsul_online.status_id', '!=', '4')
												->where('tb_konsul_online.subbid_id', $subbid_id_baru)
												->where('users.mstr_role_id', '4')
												->where('users.is_active', '1')
												->where('users.id', '!=', $id_admin)
												->groupBy('users.id')
												->orderby('users.id', 'ASC')
												->orderby('jumlah', 'ASC')
									    	->first();
									    	// dd('gaada yg kosong');
									    	// dd($new_pic);
										}
										else
											{
												$new_pic = DB::table('users as a')
					    					->select('a.id as new_pic')
					    					->leftjoin(DB::raw("(select id_konsul, nama, subbid_id, layanan_id, judul, pic_id id_pic2, status_id from tb_konsul_online where status_id != '4') as b"),function($join){
											$join->on('a.subbid_id','b.subbid_id');
											$join->on('a.id','b.id_pic2');})
					    				->where('id_pic2' ,  null)
											->where('mstr_role_id', '4')
											->where('a.subbid_id', $subbid_id_baru)
											->where('a.id', '!=', $id_admin)
											->where('is_active', '1')
											->groupby('a.id')
											->orderby('id', 'ASC')
											->first();
											// ->get();	
											// dd($new_pic);
											// dd($new_pic);	
											} 
											// dd($new_pic);			
                                            // dd($new_pic);	
                                            // $email_admin = DB::table('users')->where('id', $new_pic)->value('email');
                                            // dd($email_admin);
											//KODE UNTUK UPDATE DISINI 
											$konsul_online = \App\Models\tb_konsul_online::find($id_konsul);
									    $konsul_online->pic_id = $new_pic->new_pic;
									    $konsul_online->layanan_id = $request->id_layanan_baru;
									    $konsul_online->subbid_id = $subbid_id_baru;
									    $konsul_online->koor_id = $data3->id;
									    $konsul_online->save();
								    
								    	$data_detail = \App\Models\history_pic::create([
									            'id_konsul'  			=> $id_konsul,
									            'no_tiket'  			=> $request->no_tiket,
									            'subbid_id_lama'  => $request->subbid_id,
									            'layanan_id_lama'  			=> $request->layanan_id,
									            'pic_lama'  			=> $request->pic_id_lama,
									            'ket_pic'  			=> $request->ket_pic,
									            'changed_by'  			=> $id_admin,

				 							]);

                                        $email_subkoor = DB::table('users')->where('id', $data3->id)->value('email');
                                        $email_admin = DB::table('users')->where('id', $new_pic->new_pic)->value('email');
                                            $data2 = [
                                                'title' => 'Konsultasi Online Tiket #'.$request->no_tiket.' Menunggu Respon PIC',
                                                'id_konsul' => $request->id_konsul,
                                                'no_tiket' => $request->no_tiket,
                                            ];
                                            // // dd($data);                            
                                            $emails = [$email_admin, $email_subkoor]; 
                                            // dd($emails);                          
                                            Mail::to($emails)->send(new SendMail2($data2));
				
    	}
    	// return redirect('/admin_konsul_online')->with('sukses', 'PIC berhasil diubah!');
    	return redirect()->action('App\Http\Controllers\AdminController@list_konsulonline_open')->with(['active' => $active])->with('sukses', 'PIC berhasil diubah!');
    }


    	 public function manage_layanan()
	    {
	    	$active = 'layanan';
	    	$data_layanan = \App\Models\mstr_layanan::leftjoin('mstr_bidang', function($join2) {
	      $join2->on('mstr_layanan.subbid_id', '=', 'mstr_bidang.subbid_id');})
	      ->select('mstr_layanan.id as layanan_id', 'mstr_layanan.subbid_id', 'mstr_layanan.bidang_id', 'mstr_bidang.nama_bidang', 'mstr_layanan.jenis_layanan', 'mstr_layanan.status')
	    	->get();
	    	$data_bidang = \App\Models\mstr_bidang::all();
	    	return view('admin.manage_layanan')->with(['data_layanan' => $data_layanan])->with(['data_bidang' => $data_bidang])->with(['active' => $active]);
    	}
	    

	    public function create_layanan(Request $request)
	    {
	    	$active = 'layanan';
	    	$data_bidang = DB::table('mstr_bidang')->where('subbid_id', $request->subbid_id)->value('bidang_id');
	    	// dd($data_bidang);

        	$data_layanan = \App\Models\mstr_layanan::create(
        	[
        	'jenis_layanan' => $request->jenis_layanan,
        	'subbid_id' => $request->subbid_id,
        	'bidang_id' => $data_bidang,
        	]);
	        // return redirect('/manage_layanan');
	        return redirect()->action('App\Http\Controllers\AdminController@manage_layanan')->with(['active' => $active])->with('sukses', 'Jenis Layanan Berhasil Ditambahkan');
    	}

    	public function inactivate_layanan($layanan_id,Request $request)
	    {
	    	// dd($id);
	    	$active = 'layanan';
	    	$id2 = decrypt($layanan_id);

	    			$data_layanan = \App\Models\mstr_layanan::find($id2);
				    $data_layanan->status = '0';
				    $data_layanan->save();

	        // return redirect('/manage_layanan');
	        return redirect()->action('App\Http\Controllers\AdminController@manage_layanan')->with(['active' => $active])->with('sukses', 'Jenis Layanan Berhasil Di-nonaktifkan');
    	}

    	public function activate_layanan($layanan_id,Request $request)
	    {
	    	// dd($id);
	    	$active = 'layanan';
	    	$id2 = decrypt($layanan_id);

	    			$data_layanan = \App\Models\mstr_layanan::find($id2);
				    $data_layanan->status = '1';
				    $data_layanan->save();

	        // return redirect('/manage_layanan');
	        return redirect()->action('App\Http\Controllers\AdminController@manage_layanan')->with(['active' => $active])->with('sukses', 'Jenis Layanan Berhasil Di-aktifkan');
    	}


    	public function exportexcel(Request $request)
	    {
	    		$opentiket = DB::select(DB::raw("SELECT id_fix, users.NAME AS nama_pic, users.subbid_id, count( no_tiket ) AS jumlah_tiket FROM (SELECT no_tiket, pic_id, koor_id, subbid_id, CASE WHEN status_id = 1 THEN pic_id ELSE koor_id END id_fix, status_id FROM tb_konsul_online WHERE status_id IN ( 1, 2 ) ORDER BY pic_id) z LEFT JOIN users ON z.id_fix = users.id  GROUP BY id_fix ORDER BY subbid_id, mstr_role_id desc"));
	    		// dd($opentiket);

				    $spreadsheet = new Spreadsheet();
						$sheet = $spreadsheet->getActiveSheet();
						$sheet->getColumnDimension('B')->setWidth(25);
						$sheet->getColumnDimension('C')->setWidth(8);
						$sheet->getColumnDimension('D')->setWidth(12);
						$sheet->getStyle('C:D')->getAlignment()->setHorizontal('center');

						// foreach (range('A', $sheet->getHighestColumn()) as $col) {
						//    $sheet->getColumnDimension($col)->setAutoSize(true);
						// }

						$mytime = Carbon::now()->format('d M Y H:i');
						$sheet->setCellValue(
						    'A1',
						    'Tanggal tarik data : '.$mytime
						);
						$sheet->setCellValue('A3', 'No');
		        $sheet->setCellValue('B3', 'Nama PIC');
		        $sheet->setCellValue('C3', 'Subbid');
		        $sheet->setCellValue('D3', 'Jumlah Tiket');

		        $i = 4;
						$no = 1;
		        foreach($opentiket as $value){
		        		$sheet->setCellValue('A'.$i, $no++);
						    $sheet->setCellValue('B'.$i, $value->nama_pic);
						    $sheet->setCellValue('C'.$i, $value->subbid_id);
						    $sheet->setCellValue('D'.$i, $value->jumlah_tiket);  
						    $i++;
		        }

					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment;filename="Rekap Open Tiket Konsultasi"'.$mytime.".xlsx");
					header('Cache-Control: max-age=0');

					$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
					$writer->save('php://output');
		  }

}