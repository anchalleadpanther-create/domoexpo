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
        Schema::create('cpr_carts', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_id')->nullable()->index('cart_id');
            $table->unsignedBigInteger('supplier_order_id')->nullable()->index('supplier_order_id');
            $table->unsignedBigInteger('buyer_id')->nullable()->index('user_id');
            $table->unsignedBigInteger('seller_id')->index('seller_id');
            $table->unsignedBigInteger('product_id')->index('product_id');
            $table->string('color', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('product_image')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('type_value_id_1')->nullable();
            $table->unsignedBigInteger('type_value_id_2')->nullable();
            $table->unsignedBigInteger('min_qty')->nullable();
            $table->unsignedBigInteger('max_qty')->nullable();
            $table->string('unit', 100)->nullable();
            $table->double('rrp', 10, 2)->nullable();
            $table->double('discount', 10, 2)->nullable();
            $table->double('price_unit', 10, 2)->nullable();
            $table->double('stock', 10, 2)->nullable();
            $table->double('variant_type', 10, 2)->nullable();
            $table->tinyInteger('have_options')->default(0);
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode', 100)->nullable();
            $table->string('product_condition', 100)->nullable();
            $table->string('pay', 100)->nullable();
            $table->string('partial', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('payment_instruction_for_bank')->nullable();
            $table->string('description')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('warranty_terms')->nullable();
            $table->longText('return_and_exchange_policy')->nullable();
            $table->string('warranty_period')->nullable();
            $table->string('closing_date', 100)->nullable();
            $table->string('closing_time', 100)->nullable();
            $table->string('weight', 100)->nullable();
            $table->string('length', 100)->nullable();
            $table->string('breadth', 100)->nullable();
            $table->string('height', 100)->nullable();
            $table->string('pickup_availability', 100)->nullable();
            $table->text('delivery_options')->nullable();
            $table->text('material')->nullable();
            $table->string('gst', 20)->nullable();
            $table->string('hsn_code', 50)->nullable();
            $table->unsignedBigInteger('quantity');
            $table->boolean('coupon_used')->default(false);
            $table->double('coupon_amount', 10, 2)->unsigned()->default(0);
            $table->string('coupon_code')->nullable();
            $table->unsignedInteger('coupon_percent')->default(0);
            $table->string('custom_name')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->tinyInteger('order_status')->default(0);
            $table->timestamp('cancelled_at')->useCurrent();
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
        Schema::dropIfExists('cpr_carts');
    }
};
