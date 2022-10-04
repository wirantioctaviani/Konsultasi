<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsulOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konsul_online', function (Blueprint $table) {
            #$table->id_detail();
            $table->bigincrements('id_konsul');
            $table->string('no_tiket')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('unit_kerja');
            $table->string('no_hp');
            $table->string('email');
            $table->integer('layanan_id');
            $table->string('judul');
            $table->integer('subbid_id');
            $table->integer('pic_id');
            // $table->integer('pic_lama')->nullable();
            $table->integer('koor_id');
            $table->Integer('status_id');
            $table->string('created_by');
            // $table->integer('ket_pic')->nullable();
            $table->timestamps();
            // $table->timestamp('created_date');
            // $table->timestamp('updated_date');
            #$table->foreign('id_status')->references('id_status')->on('master_status');
            #$table->integer('id_status')->unsigned();
            #$table->foreignId('id_status')->constrained('mstr_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_konsul_online');
    }
}
