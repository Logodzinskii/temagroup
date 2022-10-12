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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('article');
            $table->string('type');
            $table->string('name');
            $table->string('meta_title');
            $table->string('meta_descriptions');
            $table->string('configurations');
            $table->string('options');
            $table->string('image');
            $table->string('file');
            $table->integer('price');
            $table->integer('delivery_price');
            $table->integer('delivery_day');
            $table->integer('installation_price');
            $table->string('status');
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
        Schema::dropIfExists('catalogs');
    }
};
