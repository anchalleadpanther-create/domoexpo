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
        Schema::create('cpr_tickets', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('related_to')->nullable();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('ticket_document')->nullable();
            $table->string('against')->nullable();
            $table->string('select_t')->nullable();
            $table->string('issue_title')->nullable();
            $table->string('issue_description')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('cpr_tickets');
    }
};
