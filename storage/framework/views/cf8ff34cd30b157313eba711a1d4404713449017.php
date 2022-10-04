<h1>Halo Bapak/Ibu <?php echo e($data['nama']); ?></h1>
<p>Konsultasi dengan nomor tiket #<?php echo e($data['no_tiket']); ?> telah mendapat respon dari PIC kami.</p>
<p>Silahkan klik <a href="<?php echo e(action('App\Http\Controllers\UsersController@respon_konsulonline', [encrypt($data['id_konsul'])])); ?>">di sini</a> untuk melihat detail konsultasi.</p> 
<br>

<p>Terimakasih,<br>
<?php echo e('Pusbin JFA'); ?>

</p> <?php /**PATH D:\web\konsultasi\resources\views/admin/EmailRespontoUser2.blade.php ENDPATH**/ ?>