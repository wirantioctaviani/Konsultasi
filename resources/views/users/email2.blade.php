<h1>Halo Bapak/Ibu PIC</h1>
<p>Terdapat Konsultasi dengan nomor tiket #{{$data['no_tiket']}} yang perlu direspon.</p>
<p>Silahkan klik <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data['id_konsul'])]) }}">di sini</a> untuk merespon konsultasi.</p> 

<br>

<p>Terimakasih,<br>
{{ 'Pusbin JFA' }}
</p>