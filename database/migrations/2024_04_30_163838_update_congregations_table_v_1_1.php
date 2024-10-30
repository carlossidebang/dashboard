<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCongregationsTableV11 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('congregations')) {
            Schema::table('congregations', function (Blueprint $table) {
                $table->date('death_date')->nullable();
                $table->date('out_date')->nullable();
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
        if (Schema::hasTable('congregations')) {
            Schema::table('congregations', function (Blueprint $table) {
                $table->dropColumn('death_date');
                $table->dropColumn('out_date');
            });
        }
    }
}
