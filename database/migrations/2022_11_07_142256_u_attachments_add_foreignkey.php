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
        Schema::table('atch_parent', function(Blueprint $table) {
            // $table->foreign('pid')->references('pid')->on('posts')->onDelete('RESTRICT');
            $table->foreign('atchid')->references('atchid')->on('attachments')->onDelete('RESTRICT');
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
