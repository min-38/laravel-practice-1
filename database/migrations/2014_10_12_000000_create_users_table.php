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
        Schema::create('users', function (Blueprint $table) {
            $table->id('upid');
            $table->string('user_name')->unique()->comment("유저명");
            $table->string('user_id')->unique()->comment("유저 아이디");
            $table->integer('user_rank')->default(2)->comment("0: 최고 관리자, 1: 관리자, 2: 일반인");
            $table->string('email')->unique()->comment("유저 이메일");
            $table->timestamp('email_verified_at')->nullable()->comment("유저 이메일 인증 여부");
            $table->string('phone')->nullable()->comment("유저 핸드폰번호");
            $table->string('password')->comment("유저 패스워드");
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->comment("유저 탈퇴 여부");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
