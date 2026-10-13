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
        Schema::create('cpr_dropdown_value', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->integer('parent')->default(0);
            $table->integer('dropdown_id');
            $table->string('dropdown_value', 75);
            $table->string('sortid', 10)->default('888');
            $table->boolean('displayflag')->default(true);
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
        Schema::dropIfExists('cpr_dropdown_value');
    }
};
