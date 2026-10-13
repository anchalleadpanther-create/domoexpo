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
        Schema::create('cpr_home_sliders', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->text('slider_image');
            $table->text('slider_link')->nullable();
            $table->string('slider_title')->nullable();
            $table->text('slider_description')->nullable();
            $table->string('slider_button_text')->nullable();
            $table->text('slider_button_link')->nullable();
            $table->string('position', 100)->nullable();
            $table->integer('sort')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpr_home_sliders');
    }
};
