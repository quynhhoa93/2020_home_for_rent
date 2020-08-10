<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_type')->default(null);
            $table->bigInteger('id_user')->default(null);
            $table->string('name');
            $table->string('address');
            $table->text('description');
            $table->tinyInteger('status');
            $table->tinyInteger('is_approve')->default(0);
            $table->string('image');
            $table->string('price');
            $table->string('slug');
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
        Schema::dropIfExists('information');
    }
}
