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
        Schema::create('cpr_products', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('uuid', 100)->fulltext('uuid');
            $table->unsignedBigInteger('parent_id')->nullable()->default(0)->index('parent_id');
            $table->unsignedBigInteger('user_id')->nullable()->index('user_id');
            $table->unsignedBigInteger('brand_id')->nullable()->index('brand_id');
            $table->bigInteger('seller_id')->nullable()->index('seller_id');
            $table->unsignedBigInteger('type_value_id_1')->nullable()->index('type_value_id_1');
            $table->unsignedBigInteger('type_value_id_2')->nullable()->index('type_value_id_2');
            $table->text('front_end_search_keyword')->nullable()->fulltext('front_end_search_keyword');
            $table->unsignedBigInteger('min_qty')->nullable();
            $table->unsignedBigInteger('max_qty')->nullable();
            $table->string('unit', 100)->nullable();
            $table->double('rrp', 10, 2)->unsigned()->nullable();
            $table->double('discount', 10, 2)->unsigned()->default(0);
            $table->double('price_unit', 10, 2)->unsigned()->nullable();
            $table->double('stock', 10, 2)->unsigned()->nullable();
            $table->string('variant_type')->nullable()->default('single');
            $table->unsignedTinyInteger('have_options')->default(1);
            $table->string('name')->nullable()->fulltext('name');
            $table->string('slug')->nullable();
            $table->string('sku')->nullable()->fulltext('sku_2');
            $table->string('sku_group_code', 50)->nullable();
            $table->string('barcode', 100)->nullable();
            $table->string('product_condition', 100)->nullable();
            $table->string('pay', 100)->nullable();
            $table->string('partial', 100)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('payment_instruction_for_bank')->nullable();
            $table->longText('description')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('warranty_terms')->nullable();
            $table->longText('size_chart')->nullable();
            $table->string('warranty_period')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('closing_time')->nullable();
            $table->string('weight', 100)->nullable();
            $table->string('length', 100)->nullable();
            $table->string('breadth', 100)->nullable();
            $table->string('height', 100)->nullable();
            $table->string('warranty')->nullable();
            $table->text('delivery_options')->nullable();
            $table->text('material')->nullable()->fulltext('material');
            $table->string('gst', 20)->nullable();
            $table->string('hsn_code', 50)->nullable();
            $table->text('wash_care')->nullable();
            $table->text('gender')->default('')->fulltext('gender');
            $table->text('occasion')->default('')->fulltext('occasion');
            $table->string('availability', 100)->nullable()->fulltext('availability');
            $table->text('youtube_url')->nullable();
            $table->string('meta_title', 200)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords', 200)->nullable();
            $table->longText('disclaimer')->nullable();
            $table->text('collection')->default('');
            $table->text('components')->nullable();
            $table->text('lining')->nullable();
            $table->text('print_pattern')->nullable();
            $table->text('embroidery_work')->nullable();
            $table->text('fit')->nullable();
            $table->text('neck_type')->nullable();
            $table->text('style_customization')->nullable();
            $table->text('how_to_use')->nullable();
            $table->text('good_to_know')->nullable();
            $table->text('suitable_for')->nullable();
            $table->text('expiry')->nullable();
            $table->text('imported_from')->nullable();
            $table->text('ingredients')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedInteger('sort')->nullable()->default(8888);
            $table->boolean('is_allowed_country')->default(false)->index('is_allowed_country');
            $table->boolean('is_custom')->default(false);
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->index(['sku'], 'sku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpr_products');
    }
};
