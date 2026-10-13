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
        Schema::create('cpr_wallet_history', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index('customer_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('order_id_supplier', 100)->nullable();
            $table->string('title', 100)->nullable();
            $table->double('amount', 10, 2)->unsigned();
            $table->string('type', 100)->nullable();
            $table->double('balance', 10, 2);
            $table->text('remark')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpr_wallet_history');
    }
};
