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
        Schema::create('cpr_currencies', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->string('currency', 25);
            $table->string('currency_code', 20);
            $table->string('currency_display_code', 10);
            $table->double('con_ratio', 10, 4)->unsigned();
            $table->boolean('status')->default(false);
            $table->integer('country_id');
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
        Schema::dropIfExists('cpr_currencies');
    }
};
