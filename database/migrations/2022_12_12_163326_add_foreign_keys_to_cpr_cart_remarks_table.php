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
    Schema::table('cpr_cart_remarks', function (Blueprint $table) {
      $table->foreign(['product_cart_id'], 'cpr_cart_remarks_ibfk_1')->references(['id'])->on('cpr_carts')->onUpdate('CASCADE')->onDelete('CASCADE');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('cpr_cart_remarks', function (Blueprint $table) {
      $table->dropForeign('cpr_cart_remarks_ibfk_1');
    });
  }
};
