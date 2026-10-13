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
        Schema::create('cpr_brands', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable()->index('cpr_brands_ibfk_1');
            $table->string('brand_name')->nullable();
            $table->string('brand_slug')->nullable();
            $table->string('tag')->nullable();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->string('certificate', 100)->nullable();
            $table->string('reseller_auth_letter', 100)->nullable();
            $table->longText('size_chart')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(1);
            $table->unsignedTinyInteger('featured')->nullable();
            $table->double('discount', 10, 2)->unsigned()->default(0);
            $table->boolean('is_allowed_country')->default(false)->index('is_allowed_country');
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
        Schema::dropIfExists('cpr_brands');
    }
};
