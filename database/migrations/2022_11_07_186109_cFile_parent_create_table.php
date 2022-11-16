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
        Schema::create('atch_parent', function (Blueprint $table) {
            $table->id('apid');
            $table->unsignedBigInteger('pid')->comment("게시글 번호");
            $table->unsignedBigInteger('athid')->comment("첨부파일 번호");
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
