 <h1>Halo Bapak/Ibu {{$data['nama']}}</h1>
<p>Konsultasi dengan nomor tiket #{{$data['no_tiket']}} telah mendapat respon dari PIC kami.</p>
<p>Silahkan klik <a href="{{ action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($data['id_konsul'])]) }}">di sini</a> untuk melihat detail konsultasi.</p>
<p>Mohon untuk memberikan respon dalam waktu 60 menit karena tiket akan diclose secara otomatis oleh sistem.</p> 
<br>

<p>Terimakasih,<br>
{{ 'Pusbin JFA' }}
</p>