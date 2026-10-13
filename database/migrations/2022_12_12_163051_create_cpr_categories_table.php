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
        Schema::create('cpr_categories', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('category_slug')->nullable();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->unsignedTinyInteger('featured')->nullable();
            $table->boolean('is_allowed_country')->default(false)->index('is_allowed_country');
            $table->string('featured_banner')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->integer('sort')->nullable()->default(8888);
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
        Schema::dropIfExists('cpr_categories');
    }
};
