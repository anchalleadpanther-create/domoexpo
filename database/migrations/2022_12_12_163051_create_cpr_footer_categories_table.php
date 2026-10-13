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
        Schema::create('cpr_footer_categories', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->default(0);
            $table->string('name')->nullable();
            $table->text('link')->nullable();
            $table->unsignedInteger('sort')->default(8888);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('cpr_footer_categories');
    }
};
