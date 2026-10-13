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
        Schema::create('cpr_companies', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('entity_category', 100)->nullable();
            $table->string('entity_type', 100)->nullable();
            $table->string('company_name', 150)->nullable();
            $table->string('company_slug')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_email', 200)->nullable();
            $table->string('company_phone_code', 20)->nullable();
            $table->string('company_phone', 20)->nullable();
            $table->text('company_website')->nullable();
            $table->string('registration_type', 100)->nullable();
            $table->string('company_gst_number', 20)->nullable();
            $table->string('company_pan_number', 20)->nullable();
            $table->string('company_uac_number', 50)->nullable();
            $table->integer('country_id')->nullable();
            $table->string('document_one')->nullable();
            $table->string('document_two')->nullable();
            $table->string('document_three')->nullable();
            $table->string('document_four')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('contact_name', 100)->nullable();
            $table->string('contact_email', 200)->nullable();
            $table->string('contact_mobile', 20)->nullable();
            $table->string('contact_department', 100)->nullable();
            $table->string('contact_designation', 100)->nullable();
            $table->string('contact_photo')->nullable();
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
        Schema::dropIfExists('cpr_companies');
    }
};
