<h1>Halo Bapak/Ibu {{$data['nama']}}</h1>
<p>Formulir  Konsultasi Online dengan nomor tiket #{{$data['no_tiket']}} berhasil di submit.</p>
<p>Silahkan klik <a href="{{ action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($data['id_konsul'])]) }}">di sini</a> untuk melihat progress konsultasi.</p> 

<br>

<p>Terimakasih,<br>
{{ 'Pusbin JFA' }}
</p>