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
        Schema::create('cpr_import_sheets', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('file', 100);
            $table->string('type', 100)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('user_type', 50)->nullable();
            $table->string('seller', 200)->nullable();
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
        Schema::dropIfExists('cpr_import_sheets');
    }
};
