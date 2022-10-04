<h1>Halo Bapak/Ibu Subkoordinator</h1>
<p>Terdapat jawaban PIC untuk Konsultasi dengan nomor tiket #{{$data['no_tiket']}} yang perlu untuk diapprove.</p>
<p>Silahkan klik <a href="{{ action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data['id_konsul'])]) }}">di sini</a> untuk melakukan reviu.</p> 

<br>

<p>Terimakasih,<br>
{{ 'Pusbin JFA' }}
</p>