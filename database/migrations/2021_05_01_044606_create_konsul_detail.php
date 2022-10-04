<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsulDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konsul_detail', function (Blueprint $table) {
            $table->bigincrements('id_detail');
            $table->string('no_tiket')->unique();
            $table->biginteger('konsul_id');
            // $table->foreign('id_konsul')->references('id_konsul')->on('tb_konsul_online');
            $table->longtext('details');
            $table->text('dokumen')->nullable();
            $table->string('created_by');
            $table->integer('is_answered');
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
        Schema::dropIfExists('tb_konsul_detail');
    }
}
