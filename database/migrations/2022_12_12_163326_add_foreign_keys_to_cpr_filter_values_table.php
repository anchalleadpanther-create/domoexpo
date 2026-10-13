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
        Schema::table('cpr_filter_values', function (Blueprint $table) {
            $table->foreign(['filter_id'], 'cpr_filter_values_ibfk_1')->references(['id'])->on('cpr_filters')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cpr_filter_values', function (Blueprint $table) {
            $table->dropForeign('cpr_filter_values_ibfk_1');
        });
    }
};
