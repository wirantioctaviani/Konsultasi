<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_pic', function (Blueprint $table) {
            $table->bigincrements();
            $table->integer('id_konsul');
            $table->string('no_tiket');
            $table->integer('layanan_id_lama');
            // $table->integer('layanan_id_baru');
            $table->integer('subbid_id_lama');
            // $table->integer('subbid_id_baru');
            $table->integer('pic_lama');
            // $table->integer('pic_baru');
            $table->longtext('ket_pic');
            $table->integer('changed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_pic');
    }
}
