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
        Schema::rename('files', 'attachments');

        Schema::table('attachments', function(Blueprint $table) {
            $table->renameColumn('fid', 'atchid');
            $table->renameColumn('file_name', 'atch_name');
            $table->renameColumn('file_chg_name', 'atch_chg_name');
            $table->renameColumn('file_ext', 'atch_ext');
            $table->renameColumn('file_size', 'atch_size');
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
