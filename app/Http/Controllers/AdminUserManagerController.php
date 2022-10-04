<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class AdminUserManagerController extends Controller
{
    // CODE UNTUK VIEW HALAMAN MANAGE USER
    public function manage_user()
    {
        $active = 'user';
        $data_user = \App\Models\User::leftjoin('mstr_bidang', function($join2) {
          $join2->on('users.subbid_id', '=', 'mstr_bidang.subbid_id');})
            ->leftjoin('mstr_role', function($join3) {
          $join3->on('users.mstr_role_id', '=', 'mstr_role.id');})
          ->select('users.id as id_user', 'name', 'nip', 'username', 'email', 'mstr_role_id', 'users.subbid_id', 
            'users.bidang_id', 'nama_bidang', 'nama_role', 'is_active')
            ->get();

            // dd($data_user);
        $data_bidang = \App\Models\mstr_bidang::all();
        // dd($data_bidang);
        $data_role = \App\Models\mstr_role::all();
        // dd($data_role);
        return view('admin.manage_user2')->with(['data_user' => $data_user])->with(['data_bidang' => $data_bidang])->with(['data_role' => $data_role])->with(['active' => $active]);
    }

    public function user_edit($id_user, Request $request)
    {
        $active = 'user';
        $id_users = decrypt($id_user);
        // dd($id_users);
        $data_user = \App\Models\User::leftjoin('mstr_bidang', function($join2) {
          $join2->on('users.subbid_id', '=', 'mstr_bidang.subbid_id');})
        ->leftjoin('mstr_role', function($join3) {
          $join3->on('users.mstr_role_id', '=', 'mstr_role.id');})
            ->select('users.id as id_user', 'name', 'nip', 'username', 'email', 'mstr_role_id', 'users.subbid_id', 
            'users.bidang_id', 'nama_bidang', 'nama_role', 'is_active', 'mstr_role_id')
            ->where('users.id', $id_users)
            ->get();

        $data_bidang = \App\Models\mstr_bidang::all();
        $data_role = \App\Models\mstr_role::all();
        // dd($data_role);
        return view('admin.edit_user')->with(['data_user' => $data_user])->with(['data_bidang' => $data_bidang])->with(['data_role' => $data_role])->with(['active' => $active]);
    }

    public function proses_edit($id_user, Request $request)
    {
        // dd($request->mstr_role_id);
        // dd($request->all());
        $active = 'user';
        if ($request->has('is_active')) 
        {
                    $data_user = \App\Models\user::find($id_user);
                    $data_user->name = $request->name;
                    $data_user->nip = $request->nip;
                    $data_user->username = $request->username;
                    $data_user->email = $request->email;
                    $data_user->mstr_role_id = $request->mstr_role_id2;
                    $data_user->subbid_id = $request->subbid_id;
                    $data_user->is_active = '1';
                    $data_user->save();

                    return redirect()->action('App\Http\Controllers\AdminUserManagerController@manage_user')->with(['active' => $active])->with('sukses', 'Data user berhasil diupdate!');
        }

        else{
            if($request->mstr_role_id = 4 || $request->mstr_role_id = 3)
                {
                    // dd($request->all());
                    $data_konsul_online = \App\Models\tb_konsul_online::leftjoin('users', function($join) 
                    {$join->on('tb_konsul_online.pic_id', '=', 'users.id');})
                            ->selectraw('count(tb_konsul_online.id_konsul) as jumlah')
                            ->where('tb_konsul_online.pic_id', $id_user)
                            ->where('tb_konsul_online.status_id', '!=', '4')
                            ->groupby('tb_konsul_online.pic_id')
                            ->get();
                            // dd($data_konsul_online);

                        if(!$data_konsul_online->isEmpty()){
                            // echo('Ada data');
                            // Session::flash('gagal','User tidak bisa dinon-aktifkan karena masih terdapat open case');
                            return redirect()->action('App\Http\Controllers\AdminUserManagerController@manage_user')->with(['active' => $active])->with('gagal', 'User tidak bisa dinon-aktifkan karena masih terdapat open case');
                            }
                            else{
                            $data_user = \App\Models\user::find($id_user);
                            $data_user->name = $request->name;
                            $data_user->nip = $request->nip;
                            $data_user->username = $request->username;
                            $data_user->email = $request->email;
                            $data_user->mstr_role_id = $request->mstr_role_id2;
                            $data_user->subbid_id = $request->subbid_id;
                            $data_user->is_active = '0';
                            $data_user->save();

                            return redirect()->action('App\Http\Controllers\AdminUserManagerController@manage_user')->with(['active' => $active])->with('sukses', 'User telah di non-aktifkan!');
                            }
                }
            else{
                $data_user = \App\Models\user::find($id_user);
                                    $data_user->name = $request->name;
                                    $data_user->nip = $request->nip;
                                    $data_user->username = $request->username;
                                    $data_user->email = $request->email;
                                    $data_user->mstr_role_id = $request->mstr_role_id2;
                                    $data_user->subbid_id = $request->subbid_id;
                                    $data_user->is_active = '0';
                                    $data_user->save();

                            return redirect()->action('App\Http\Controllers\AdminUserManagerController@manage_user')->with(['active' => $active])->with('sukses', 'User telah di non-aktifkan!');
                }
            }
    }

// CODE UNTUK ADD USER
    public function create_user(Request $request)
        {
            $active = 'user';

            // dd($request->nip);
            date_default_timezone_set("Asia/Jakarta");
            $random = Str::random(60);
                if ($request->subbid_id == '11' || $request->subbid_id == '12') {
                $data_user = \App\Models\user::insertGetId([
                'name'              => $request->name,
                'nip'               => $request->nip,
                'username'          => $request->email,
                'email'             => $request->email,
                'password'          => bcrypt($request->password),
                'remember_token'    => $random,
                'mstr_role_id'      => $request->role,
                'subbid_id'         => $request->subbid_id,
                'bidang_id'         => '1',
                'is_active'         => '1',
                ]);

                    $name = $request->name;
                    $arr = explode(' ', $name);
                    $inisial = '';
                    foreach($arr as $kata)
                    {
                        $inisial .= substr($kata, 0,1);
                    }
                    $username = $inisial.' #'.$request->subbid_id.$data_user;
                    // dd($username);

                    $UpdateUsername = \App\Models\user::find($data_user);
                    $UpdateUsername->username = $username;
                    $UpdateUsername->save();
                }
                elseif ($request->subbid_id == '21' || $request->subbid_id == '22') {
                $data_user = \App\Models\user::insertGetId([
                'name'              => $request->name,
                'nip'               => $request->nip,
                'username'          => $request->email,
                'email'             => $request->email,
                'password'          => bcrypt($request->password),
                'remember_token'    => $random,
                'mstr_role_id'      => $request->role,
                'subbid_id'         => $request->subbid_id,
                'bidang_id'         => '2',
                'is_active'         => '1',
                ]);

                    $name = $request->name;
                    $arr = explode(' ', $name);
                    $inisial = '';
                    foreach($arr as $kata)
                    {
                        $inisial .= substr($kata, 0,1);
                    }
                    $username = $inisial.' #'.$request->subbid_id.$data_user;
                    // dd($username);

                    $UpdateUsername = \App\Models\user::find($data_user);
                    $UpdateUsername->username = $username;
                    $UpdateUsername->save();
                }

                elseif ($request->subbid_id == '31' || $request->subbid_id == '32') {
                $data_user = \App\Models\user::insertGetId([
                'name'              => $request->name,
                'nip'               => $request->nip,
                'username'          => $request->email,
                'email'             => $request->email,
                'password'          => bcrypt($request->password),
                'remember_token'    => $random,
                'mstr_role_id'      => $request->role,
                'subbid_id'         => $request->subbid_id,
                'bidang_id'         => '3',
                'is_active'         => '1',
                ]);

                    $name = $request->name;
                    $arr = explode(' ', $name);
                    $inisial = '';
                    foreach($arr as $kata)
                    {
                        $inisial .= substr($kata, 0,1);
                    }
                    $username = $inisial.' #'.$request->subbid_id.$data_user;
                    // dd($username);

                    $UpdateUsername = \App\Models\user::find($data_user);
                    $UpdateUsername->username = $username;
                    $UpdateUsername->save();
                }
            
            return redirect()->action('App\Http\Controllers\AdminUserManagerController@manage_user')->with(['active' => $active])->with('sukses', 'User Berhasil ditambahkan!'); 
        }
}
