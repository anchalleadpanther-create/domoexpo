<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cpr_utms', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('order_id');
      $table->text('utm_source')->nullable()->fulltext('utm_source');
      $table->text('utm_medium')->nullable()->fulltext('utm_medium');
      $table->text('utm_campaign')->nullable()->fulltext('utm_campaign');
      $table->text('utm_term')->nullable()->fulltext('utm_term');
      $table->text('utm_content')->nullable()->fulltext('utm_content');
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
    Schema::dropIfExists('cpr_utms');
  }
};
