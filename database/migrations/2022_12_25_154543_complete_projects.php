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
        Schema::create('complete_projects', function (Blueprint $table) {
            $table->id();
            $table->text('category');
            $table->text('article');
            $table->text('type');
            $table->text('meta_title');
            $table->text('meta_descriptions');
            $table->text('image');
            $table->text('price');
            $table->text('chpu_complite');
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
        Schema::dropIfExists('complete_projects');
    }
};
