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
        Schema::create('price_kitchens', function (Blueprint $table) {
            $table->id();
            $table->string('nameProject');
            $table->string('nameFacades');
            $table->string('imageFacades');
            $table->string('typeFacades');
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
        Schema::dropIfExists('price_kitchens');
    }
};
