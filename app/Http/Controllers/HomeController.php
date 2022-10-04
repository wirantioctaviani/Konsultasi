<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $mytime = Carbon::now()->format('d M Y');
        $data_konsul_online = \App\Models\tb_konsul_online::leftjoin('mstr_layanan', function($join) {
          $join->on('tb_konsul_online.layanan_id', '=', 'mstr_layanan.id');})
            ->selectraw('jenis_layanan, count(tb_konsul_online.id_konsul) as jumlah')
            ->groupby('tb_konsul_online.layanan_id')
            ->get();
            #dd($mytime);

        return view('admin.dashboard2')->with(['mytime' => $mytime])->with(['data_konsul_online' => $data_konsul_online]);
    }
}
