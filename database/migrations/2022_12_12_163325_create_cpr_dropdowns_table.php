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
        Schema::create('cpr_dropdowns', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->integer('parent')->default(0);
            $table->string('dropdown_type', 55);
            $table->string('dropdown_name', 75);
            $table->string('dropdown_desc')->nullable();
            $table->string('sortid', 10)->default('8888');
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
        Schema::dropIfExists('cpr_dropdowns');
    }
};
