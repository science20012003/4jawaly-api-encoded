<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOdooIdToSmsAccountPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_account_packages', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");
            $table->integer('odoo_invoice_id')->nullable()->after("odoo_id");
            $table->string('odoo_invoice_attachment')->nullable()->after("odoo_invoice_id");
        }); 
        Schema::table('account_make_ext_pays', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");
            $table->integer('odoo_invoice_id')->nullable()->after("odoo_id");
            $table->string('odoo_invoice_attachment')->nullable()->after("odoo_invoice_id");
        }); 
         Schema::table('global_invoices', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");
            $table->integer('odoo_invoice_id')->nullable()->after("odoo_id");
            $table->string('odoo_invoice_attachment')->nullable()->after("odoo_invoice_id");
        });
         Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");
            $table->integer('odoo_invoice_id')->nullable()->after("odoo_id");
            $table->string('odoo_invoice_attachment')->nullable()->after("odoo_invoice_id");
        }); 
         Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");
            $table->integer('odoo_invoice_id')->nullable()->after("odoo_id");
            $table->string('odoo_invoice_attachment')->nullable()->after("odoo_invoice_id");
        });
         Schema::table('whatsapp_account_packages', function (Blueprint $table) {
            $table->integer('odoo_id')->nullable()->after("daftra_id");
            $table->integer('odoo_invoice_id')->nullable()->after("odoo_id");
            $table->string('odoo_invoice_attachment')->nullable()->after("odoo_invoice_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_make_ext_pays', function (Blueprint $table) {
           $table->dropColumn(['odoo_id', 'odoo_invoice_id', 'odoo_invoice_attachment']);
        });
         Schema::table('sms_account_packages', function (Blueprint $table) {
           $table->dropColumn(['odoo_id', 'odoo_invoice_id', 'odoo_invoice_attachment']);
        });
         Schema::table('global_invoices', function (Blueprint $table) {
           $table->dropColumn(['odoo_id', 'odoo_invoice_id', 'odoo_invoice_attachment']);
        });
          Schema::table('hawsabah_pays', function (Blueprint $table) {
           $table->dropColumn(['odoo_id', 'odoo_invoice_id', 'odoo_invoice_attachment']);
        });
          Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
           $table->dropColumn(['odoo_id', 'odoo_invoice_id', 'odoo_invoice_attachment']);
        }); 
         Schema::table('whatsapp_account_packages', function (Blueprint $table) {
           $table->dropColumn(['odoo_id', 'odoo_invoice_id', 'odoo_invoice_attachment']);
        });
    }
}
