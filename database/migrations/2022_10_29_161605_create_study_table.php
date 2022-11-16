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
        Schema::create('study', function (Blueprint $table) {
            $table->id('study_id');
            $table->string('study_title')->unique()->comment("공부 게시글 제목");
            $table->mediumText('study_contents')->comment("공부 게시글 본문");
            $table->unsignedBigInteger('study_writer')->comment("공부 게시글 작성자");
            $table->char('isPrivate', 1)->default('N')->comment("비밀글 여부 (Y/N)");
            $table->string('password')->nullable()->comment("비밀글 패스워드");
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->comment("게시글 삭제 시간");

            
            $table->foreign('study_writer')->references('upid')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study');

    }
};
