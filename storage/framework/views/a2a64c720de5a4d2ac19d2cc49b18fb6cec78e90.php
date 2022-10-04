<h1>Halo Bapak/Ibu PIC</h1>
<p>Terdapat Konsultasi dengan nomor tiket #<?php echo e($data['no_tiket']); ?> yang perlu direspon.</p>
<p>Silahkan klik <a href="<?php echo e(action('App\Http\Controllers\AdminController@respon_konsulonline', [encrypt($data['id_konsul'])])); ?>">di sini</a> untuk merespon konsultasi.</p> 

<br>

<p>Terimakasih,<br>
<?php echo e('Pusbin JFA'); ?>

</p><?php /**PATH D:\website\konsultasi\resources\views/users/email2.blade.php ENDPATH**/ ?>