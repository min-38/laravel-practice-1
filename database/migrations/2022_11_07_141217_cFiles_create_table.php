<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('files', function (Blueprint $table) {
            $table->id('fid');
            $table->string('file_name')->comment("실제 파일명");
            $table->string('file_chg_name')->unique()->comment("변경된 파일명");
            $table->string('file_ext')->comment("파일 확장자");
            $table->string('file_size')->comment("파일 크기 (바이트 단위)");
            $table->string('path')->comment("파일 위치 경로");
            $table->timestamp('upload_time')->comment("업로드 시간");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
