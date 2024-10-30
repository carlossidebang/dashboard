<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdultBapitsmTableV11 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('adult_baptisms')) {
            Schema::table('adult_baptisms', function (Blueprint $table) {
                $table->string('pastor', 100);
                $table->string('father_name', 100);
                $table->string('mother_name', 100);
                $table->date('birthday_date');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('adult_baptisms')) {
            Schema::table('adult_baptisms', function (Blueprint $table) {
                $table->dropColumn('pastor');
                $table->dropColumn('father_name');
                $table->dropColumn('mother_name');
                $table->dropColumn('birthday_date');
            });
        }
    }
}
