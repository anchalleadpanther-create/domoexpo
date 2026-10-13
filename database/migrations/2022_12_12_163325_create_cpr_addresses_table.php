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
        Schema::create('cpr_addresses', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('type', 20);
            $table->string('first_name')->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('fax')->nullable();
            $table->string('company')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->integer('country')->nullable();
            $table->integer('state')->nullable();
            $table->integer('city')->nullable();
            $table->string('post_code', 20)->nullable();
            $table->string('address_type', 20)->nullable();
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
        Schema::dropIfExists('cpr_addresses');
    }
};
