<h1>Halo Bapak/Ibu <?php echo e($data['nama']); ?></h1>
<p>Formulir  Konsultasi Online dengan nomor tiket #<?php echo e($data['no_tiket']); ?> berhasil di submit.</p>
<p>Silahkan klik <a href="<?php echo e(action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($data['id_konsul'])])); ?>">di sini</a> untuk melihat progress konsultasi.</p> 

<br>

<p>Terimakasih,<br>
<?php echo e('Pusbin JFA'); ?>

</p><?php /**PATH D:\web\konsultasi\resources\views/users/email.blade.php ENDPATH**/ ?>