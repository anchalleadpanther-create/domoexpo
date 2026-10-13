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
    Schema::create('cpr_custom_tailored_queries', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->string('query_type', 50);
      $table->string('unit_type', 20)->nullable();
      $table->string('shoulder')->nullable();
      $table->string('bust')->nullable();
      $table->string('under_bust')->nullable();
      $table->string('arm_hole')->nullable();
      $table->string('sleeve_length')->nullable();
      $table->string('bicep')->nullable();
      $table->string('elbow')->nullable();
      $table->string('wrist')->nullable();
      $table->string('waist')->nullable();
      $table->string('lower_waist')->nullable();
      $table->string('hip')->nullable();
      $table->string('top_length')->nullable();
      $table->string('bottom_length')->nullable();
      $table->string('kurta_length')->nullable();
      $table->string('front_neck_depth')->nullable();
      $table->string('back_neck_depth')->nullable();
      $table->string('crotch_depth')->nullable();
      $table->string('thigh_circumference')->nullable();
      $table->string('knee_circumference')->nullable();
      $table->string('calf_circumference')->nullable();
      $table->string('ankle_circumference')->nullable();
      $table->string('name')->nullable();
      $table->string('mobile')->nullable();
      $table->string('email')->nullable();
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
    Schema::dropIfExists('cpr_custom_tailored_queries');
  }
};
