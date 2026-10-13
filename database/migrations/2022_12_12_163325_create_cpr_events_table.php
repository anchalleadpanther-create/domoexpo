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
        Schema::create('cpr_events', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('date', 100)->nullable();
            $table->string('venue')->nullable();
            $table->string('time', 100)->nullable();
            $table->string('organised_by')->nullable();
            $table->string('icon', 100)->nullable();
            $table->string('banner', 100)->nullable();
            $table->boolean('status')->nullable()->default(true);
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
        Schema::dropIfExists('cpr_events');
    }
};
