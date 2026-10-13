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
        Schema::create('cpr_product_prices', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index('product_id');
            $table->unsignedBigInteger('type_value_id_1')->nullable();
            $table->unsignedBigInteger('type_value_id_2')->nullable();
            $table->string('sku', 100)->nullable();
            $table->string('barcode', 100)->nullable();
            $table->unsignedBigInteger('min_qty')->nullable();
            $table->unsignedBigInteger('max_qty')->nullable();
            $table->string('unit', 100)->nullable();
            $table->double('rrp', 10, 2)->unsigned()->nullable();
            $table->double('discount', 10, 2)->unsigned()->nullable();
            $table->double('price_unit', 10, 2)->unsigned()->nullable();
            $table->double('stock', 10, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('cpr_product_prices');
    }
};
