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
        Schema::create('cpr_buyers', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('membership_id', 20)->nullable()->unique('membership_id');
            $table->date('membership_expiry_date')->nullable();
            $table->unsignedBigInteger('membership_points')->default(0);
            $table->string('membership_type', 100)->default('Pink Tier');
            $table->string('title', 10)->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 200)->nullable()->unique('email');
            $table->string('phone', 20)->nullable()->index('phone');
            $table->date('dob')->nullable();
            $table->tinyInteger('newsletter')->nullable();
            $table->double('wallet', 10, 2)->default(0);
            $table->string('password')->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(1);
            $table->boolean('is_guest')->default(false);
            $table->unsignedBigInteger('referred_by')->nullable();
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
        Schema::dropIfExists('cpr_buyers');
    }
};
