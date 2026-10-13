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
    Schema::table('cpr_designer_wishlist', function (Blueprint $table) {
      $table->foreign(['user_id'], 'cpr_designer_wishlist_ibfk_2')->references(['id'])->on('cpr_buyers')->onUpdate('CASCADE')->onDelete('CASCADE');
      $table->foreign(['designer_id'], 'cpr_designer_wishlist_ibfk_3')->references(['id'])->on('cpr_brands')->onUpdate('CASCADE')->onDelete('CASCADE');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('cpr_designer_wishlist', function (Blueprint $table) {
      $table->dropForeign('cpr_designer_wishlist_ibfk_2');
      $table->dropForeign('cpr_designer_wishlist_ibfk_3');
    });
  }
};
