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
        Schema::create('cpr_orders', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cart_id');
            $table->double('grand_total', 10, 2);
            $table->boolean('wallet_used')->default(false);
            $table->double('wallet', 10, 2)->default(0);
            $table->unsignedBigInteger('currency_id')->nullable()->default(101);
            $table->double('currency_con_ratio', 10, 4)->unsigned();
            $table->string('currency_code', 20);
            $table->string('shipping_name', 200);
            $table->string('shipping_email', 200);
            $table->string('shipping_phone', 20)->nullable();
            $table->string('shipping_pincode', 20)->nullable();
            $table->string('shipping_address')->nullable();
            $table->unsignedInteger('shipping_country_id');
            $table->unsignedInteger('shipping_state_id');
            $table->unsignedInteger('shipping_city_id');
            $table->string('shipping_fax', 20)->nullable();
            $table->string('shipping_company', 100)->nullable();
            $table->double('shipping_charge', 10, 2)->nullable();
            $table->string('coupon_code', 100)->nullable();
            $table->double('coupon_amount', 10, 2)->nullable();
            $table->string('gift_card')->nullable();
            $table->double('gift_card_amount', 10, 2)->unsigned()->nullable()->default(0);
            $table->double('referral_amount', 10, 2)->unsigned()->default(0);
            $table->string('payment_method', 100)->nullable();
            $table->string('razorpay_payment_id', 30)->nullable();
            $table->string('currency', 20)->nullable();
            $table->text('comment')->nullable();
            $table->string('order_via', 100)->default('online');
            $table->integer('status')->default(0)->comment('0: new 1: accepted 2: shipped 3: delivered 4: cancelled');
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
        Schema::dropIfExists('cpr_orders');
    }
};
