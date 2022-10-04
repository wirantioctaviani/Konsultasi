<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	$exitCode = Artisan::call('cache:clear');
// 	if (Auth::user()) {
//         return redirect('/home');
//     }
//     return view('admin.login');
// });

#USER
Route::get('/', 'App\Http\Controllers\UsersController@formkonsul');
Route::get('konsultasionline', 'App\Http\Controllers\UsersController@formkonsul');
Route::get('konsul_online', 'App\Http\Controllers\UsersController@konsul_online');
Route::get('detailfaq/', 'App\Http\Controllers\UsersController@detailfaq');
Route::get('hasilpencarian', 'App\Http\Controllers\UsersController@hasilpencarian');
Route::post('konsul/create', 'App\Http\Controllers\UsersController@create_konsul');
Route::get('list_konsul_online', 'App\Http\Controllers\UsersController@list_konsul_online');
Route::get('/user/{id_konsul}/respon', 'App\Http\Controllers\UsersController@respon_konsulonline');
Route::post('/respon/closed/{id_konsul}', 'App\Http\Controllers\UsersController@closed_konsulonline');
Route::post('/respon/ask/{id_konsul}', 'App\Http\Controllers\UsersController@reply_konsulonline');
Route::post('/respon/ask2/{id_konsul}', 'App\Http\Controllers\UsersController@ask_konsulonline');
Route::post('/rating/post/{id_konsul}', 'App\Http\Controllers\UsersController@store_rating');


#ADMIN PROSES LOGIN
Route::get('webmin', 'App\Http\Controllers\LoginController@index')->name('login');
// Route::get('webmin', function () {
// 	$exitCode = Artisan::call('cache:clear');
// 	if (!session()->get('user_id')) {
//         return redirect('App\Http\Controllers\LoginController@index');
//     }
//     return redirect('/dashboard');
// });
Route::post('login/process', 'App\Http\Controllers\LoginController@otentikasi');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');


#ADMIN LOGIN OLD
// Route::get('login', 'App\Http\Controllers\AuthController@login');
// Route::post('postlogin', 'App\Http\Controllers\AuthController@postlogin');
// Route::get('logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['middleware' => ['islogin', 'revalidate']], function(){
	Route::prefix('admin')->middleware('role:1')->group(function () {
		Route::get('/home', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('homes');
		Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
		Route::get('/admin_konsul_online_all', 'App\Http\Controllers\AdminController@list_konsulonline')->name('ListKonsulAll');
		Route::get('admin_konsul_online', 'App\Http\Controllers\AdminController@list_konsulonline_open')->name('ListKonsulOnGoing');;
		Route::get('/admin_konsul_online/{id_konsul}/view', 'App\Http\Controllers\AdminController@view_konsulonline');
		Route::get('/admin_konsul_online/{id_konsul}/respon', 'App\Http\Controllers\AdminController@respon_konsulonline');
		Route::get('/admin_konsul_online/{id_konsul}/changepic', 'App\Http\Controllers\AdminController@changepic');
		Route::post('changepic/fetch', 'App\Http\Controllers\AdminController@fetch_pic')->name('dynamicdependent.fetch');
		Route::post('changepic/proses/{id_konsul}', 'App\Http\Controllers\AdminController@changepic_proses');
		Route::post('/respon/reply/{id_konsul}', 'App\Http\Controllers\AdminController@reply_konsulonline');
		Route::post('/respon/approve/{id_konsul}', 'App\Http\Controllers\AdminController@approve_konsulonline');
		Route::post('/respon/revisi/{id_konsul}', 'App\Http\Controllers\AdminController@revisi_konsulonline');
		Route::get('/respon/close/{id_konsul}', 'App\Http\Controllers\AdminController@close_konsulonline');
		Route::post('/respon/prosesclose/{id_konsul}', 'App\Http\Controllers\AdminController@close_proses');

		#KHUSUS ADMIN
		Route::get('/manage_user', 'App\Http\Controllers\AdminUserManagerController@manage_user')->name('ManageUser');
		Route::post('/admin/create_user', 'App\Http\Controllers\AdminUserManagerController@create_user');
		Route::get('/manage_user/edit/{id_user}', 'App\Http\Controllers\AdminUserManagerController@user_edit');
		Route::post('/manage_user/edit_proses/{id_user}', 'App\Http\Controllers\AdminUserManagerController@proses_edit');
		Route::get('/manage_layanan', 'App\Http\Controllers\AdminController@manage_layanan');
		Route::post('/admin/create_layanan', 'App\Http\Controllers\AdminController@create_layanan');
		Route::get('/admin/inactivate_layanan/{layanan_id}', 'App\Http\Controllers\AdminController@inactivate_layanan');
		Route::get('/admin/activate_layanan/{layanan_id}', 'App\Http\Controllers\AdminController@activate_layanan');
		Route::get('/managefaq', 'App\Http\Controllers\FaqController@managefaq');
		Route::post('/addkategori', 'App\Http\Controllers\FaqController@addkategori');
		Route::post('editkategori', 'App\Http\Controllers\FaqController@editkategori');
		Route::get('deletekategori', 'App\Http\Controllers\FaqController@deletekategori');
		// Route::get('/editfaq', 'App\Http\Controllers\FaqController@editfaq');
		Route::get('/managesubkategori', 'App\Http\Controllers\FaqController@managesubkategori');
		Route::post('/addsubkategori', 'App\Http\Controllers\FaqController@addsubkategori');
		Route::post('editsubkategori', 'App\Http\Controllers\FaqController@editsubkategori');
		Route::get('deletesubkategori', 'App\Http\Controllers\FaqController@deletesubkategori');
		Route::get('/exportexcel', 'App\Http\Controllers\AdminController@exportexcel')->name('exportexcel');

		// Route::get('/closecase', 'App\Http\Controllers\CloseCaseController@index');
	});

	Route::middleware('role:1,2,3,4')->group(function () {
		Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
		Route::get('admin_konsul_online_all', 'App\Http\Controllers\AdminController@list_konsulonline');
		Route::get('/admin_konsul_online', 'App\Http\Controllers\AdminController@list_konsulonline_open');
		Route::get('/admin_konsul_online/{id_konsul}/view', 'App\Http\Controllers\AdminController@view_konsulonline');
		Route::get('/admin_konsul_online/{id_konsul}/respon', 'App\Http\Controllers\AdminController@respon_konsulonline');
		Route::get('/admin_konsul_online/{id_konsul}/changepic', 'App\Http\Controllers\AdminController@changepic');
		Route::post('changepic/fetch', 'App\Http\Controllers\AdminController@fetch_pic')->name('dynamicdependent.fetch');
		Route::post('changepic/proses/{id_konsul}', 'App\Http\Controllers\AdminController@changepic_proses');
		Route::post('/respon/reply/{id_konsul}', 'App\Http\Controllers\AdminController@reply_konsulonline');
		Route::post('/respon/approve/{id_konsul}', 'App\Http\Controllers\AdminController@approve_konsulonline');
		Route::post('/respon/revisi/{id_konsul}', 'App\Http\Controllers\AdminController@revisi_konsulonline');
		Route::get('/respon/close/{id_konsul}', 'App\Http\Controllers\AdminController@close_konsulonline');
		Route::post('/respon/prosesclose/{id_konsul}', 'App\Http\Controllers\AdminController@close_proses');
	});
}); 

#PIC, SUBKOOR, KOOR
// Route::group(['middleware' => ['auth', 'CheckRole:1,2,3,4']], function(){
// 		Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard');
// 		Route::get('admin_konsul_online_all', 'App\Http\Controllers\AdminController@list_konsulonline');
// 		Route::get('/admin_konsul_online', 'App\Http\Controllers\AdminController@list_konsulonline_open');
// 		Route::get('/admin_konsul_online/{id_konsul}/view', 'App\Http\Controllers\AdminController@view_konsulonline');
// 		Route::get('/admin_konsul_online/{id_konsul}/respon', 'App\Http\Controllers\AdminController@respon_konsulonline');
// 		Route::get('/admin_konsul_online/{id_konsul}/changepic', 'App\Http\Controllers\AdminController@changepic');
// 		Route::post('changepic/fetch', 'App\Http\Controllers\AdminController@fetch_pic')->name('dynamicdependent.fetch');
// 		Route::post('changepic/proses/{id_konsul}', 'App\Http\Controllers\AdminController@changepic_proses');
// 		Route::post('/respon/reply/{id_konsul}', 'App\Http\Controllers\AdminController@reply_konsulonline');
// 		Route::post('/respon/approve/{id_konsul}', 'App\Http\Controllers\AdminController@approve_konsulonline');
// 		Route::post('/respon/revisi/{id_konsul}', 'App\Http\Controllers\AdminController@revisi_konsulonline');
// 		Route::get('/respon/close/{id_konsul}', 'App\Http\Controllers\AdminController@close_konsulonline');
// 		Route::post('/respon/prosesclose/{id_konsul}', 'App\Http\Controllers\AdminController@close_proses');
// });	

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();


