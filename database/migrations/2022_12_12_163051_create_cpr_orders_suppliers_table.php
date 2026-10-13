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
        Schema::create('cpr_orders_suppliers', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('order_id_counter', 100);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('cart_item_id');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->text('track_url')->nullable();
            $table->string('courier', 150)->nullable();
            $table->string('tracking_id', 30)->nullable();
            $table->text('manifest_link_pdf')->nullable();
            $table->text('manifest_link')->nullable();
            $table->string('edd_stamp', 20)->nullable();
            $table->double('grand_total', 10, 2);
            $table->double('wallet_used', 10, 2)->default(0);
            $table->double('gift_card_amount', 10, 2)->default(0);
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
            $table->double('coupon_value', 10, 2)->nullable();
            $table->double('advance_amount', 10, 2)->unsigned()->default(0);
            $table->double('referral_amount', 10, 2)->unsigned()->default(0);
            $table->string('payment_method', 100)->nullable();
            $table->string('currency', 20)->nullable();
            $table->text('comment')->nullable();
            $table->string('po_document', 100)->nullable();
            $table->integer('status')->default(0)->comment('0: new 1: accepted 2: shipped 3: delivered 4: cancelled');
            $table->boolean('po_status')->default(false);
            $table->timestamp('po_status_date')->nullable();
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
        Schema::dropIfExists('cpr_orders_suppliers');
    }
};
