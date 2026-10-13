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
        Schema::create('cpr_filters', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('filter_name')->nullable();
            $table->string('alias')->nullable();
            $table->string('type', 50)->nullable();
            $table->string('description')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(1);
            $table->unsignedInteger('sort')->nullable();
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
        Schema::dropIfExists('cpr_filters');
    }
};
