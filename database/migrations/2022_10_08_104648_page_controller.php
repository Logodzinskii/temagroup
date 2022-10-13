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
       Schema::create('page_public', function (Blueprint $table) {
            $table->id();
            $table->string('pageRoutName');
            $table->string('pageMetaName');
            $table->string('pageMetaDescriptions');
            $table->string('pageMethod');
            $table->string('pageAction');
            $table->string('pageAuth');
            $table->string('pageStatus');
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
        //
    }
};
