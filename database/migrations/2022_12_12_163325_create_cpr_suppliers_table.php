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
        Schema::create('cpr_suppliers', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->string('merchandiser', 100)->nullable();
            $table->string('biz_name', 200)->nullable();
            $table->string('biz_email', 200)->nullable();
            $table->string('biz_phone', 20)->nullable();
            $table->text('biz_website')->nullable();
            $table->string('biz_type', 100)->nullable();
            $table->string('biz_area_of_biz', 150)->nullable();
            $table->string('biz_no_of_staff', 150)->nullable();
            $table->string('biz_company_type', 100)->nullable();
            $table->string('biz_supplier_type', 100)->nullable();
            $table->string('biz_company_logo')->nullable();
            $table->string('biz_supplier_banner')->nullable();
            $table->text('biz_supplier_about')->nullable();
            $table->string('biz_company', 150)->nullable();
            $table->string('biz_company_address')->nullable();
            $table->integer('biz_company_country')->nullable();
            $table->integer('biz_company_state')->nullable();
            $table->string('biz_company_city', 100)->nullable();
            $table->string('biz_company_zip', 20)->nullable();
            $table->tinyInteger('biz_same_office_address')->nullable()->default(0);
            $table->string('biz_office_company', 150)->nullable();
            $table->string('biz_office_address')->nullable();
            $table->integer('biz_office_country')->nullable();
            $table->integer('biz_office_state')->nullable();
            $table->string('biz_office_city', 100)->nullable();
            $table->string('biz_office_zip', 20)->nullable();
            $table->string('biz_reg_with', 50)->nullable();
            $table->string('biz_reg_no', 50)->nullable();
            $table->date('biz_reg_date')->nullable();
            $table->string('biz_reg_document')->nullable();
            $table->string('biz_reg_gst', 20)->nullable();
            $table->string('biz_reg_gst_document')->nullable();
            $table->string('biz_reg_gst_approve', 30)->nullable();
            $table->string('biz_reg_pan_no', 20)->nullable();
            $table->string('biz_reg_pan_document')->nullable();
            $table->string('biz_reg_pan_approve', 30)->nullable();
            $table->string('biz_bank_acc_name')->nullable();
            $table->string('biz_bank_acc_no', 30)->nullable();
            $table->string('biz_bank_name', 100)->nullable();
            $table->string('biz_bank_ifsc_code', 30)->nullable();
            $table->string('biz_bank_branch_name', 200)->nullable();
            $table->string('biz_bank_swift_code', 30)->nullable();
            $table->string('biz_bank_route_code', 30)->nullable();
            $table->string('biz_bank_acc_type', 30)->nullable();
            $table->string('biz_bank_cancel_cheque')->nullable();
            $table->string('ar_name')->nullable();
            $table->string('ar_email', 200)->nullable();
            $table->string('ar_phone', 20)->nullable();
            $table->string('ar_department', 50)->nullable();
            $table->string('ar_designation', 50)->nullable();
            $table->string('ar_photo')->nullable();
            $table->string('ar_kyc_document')->nullable();
            $table->string('accounts_name', 200)->nullable();
            $table->string('accounts_phone', 50)->nullable();
            $table->string('accounts_email', 200)->nullable();
            $table->string('reseller_auth_letter', 100)->nullable();
            $table->string('agreement_document', 100)->nullable();
            $table->unsignedInteger('commission')->default(0);
            $table->string('certificate', 100)->nullable();
            $table->unsignedTinyInteger('status')->nullable()->default(1);
            $table->unsignedTinyInteger('supplier_status')->default(0);
            $table->string('supplier_status_reason', 100)->nullable();
            $table->string('supplier_status_comment', 150)->nullable();
            $table->unsignedTinyInteger('featured')->nullable();
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
        Schema::dropIfExists('cpr_suppliers');
    }
};
