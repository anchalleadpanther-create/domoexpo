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
        Schema::create('cpr_shipping', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->integer('country_id');
            $table->string('name');
            $table->string('type', 100);
            $table->double('price_from', 10, 2)->nullable();
            $table->double('price_to', 10, 2)->nullable();
            $table->double('weight_from', 10, 2)->nullable();
            $table->double('weight_to')->nullable();
            $table->double('shipping_cost', 10, 2);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('cpr_shipping');
    }
};
