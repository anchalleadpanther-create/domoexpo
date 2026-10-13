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
        Schema::create('cpr_pages', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('name', 120);
            $table->longText('slug')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 400)->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpr_pages');
    }
};
