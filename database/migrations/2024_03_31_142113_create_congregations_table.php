<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongregationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congregations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('place_of_birth', 50);
            $table->date('birthday_date');
            $table->text('address');
            $table->enum('gender', ['pria','wanita']);
            $table->string('occupation', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('congregations');
    }
}
