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
        Schema::create('cpr_coupons', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->unsignedInteger('percent')->default(0);
            $table->date('date_from');
            $table->date('date_till');
            $table->longText('brands')->nullable()->default('[]');
            $table->longText('products')->nullable()->default('[]');
            $table->boolean('all_products')->default(false);
            $table->integer('uses')->default(0);
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('cpr_coupons');
    }
};
