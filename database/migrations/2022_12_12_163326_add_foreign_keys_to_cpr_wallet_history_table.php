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
        Schema::table('cpr_wallet_history', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'cpr_wallet_history_ibfk_1')->references(['id'])->on('cpr_buyers')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cpr_wallet_history', function (Blueprint $table) {
            $table->dropForeign('cpr_wallet_history_ibfk_1');
        });
    }
};
