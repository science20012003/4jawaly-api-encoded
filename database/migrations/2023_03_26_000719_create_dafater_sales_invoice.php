<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDafaterSalesInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('dafater_sales_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("dafater_doc_id")->nullable()->constrained("dafater_docs");
            $table->string("name")->unique();
            $table->string("creation")->nullable();
            $table->string("modified")->nullable();
            $table->string("modified_by")->nullable();
            $table->string("owner")->nullable();
            $table->tinyInteger("docstatus")->nullable();
            $table->string("parent")->nullable();
            $table->string("parentfield")->nullable();
            $table->string("parenttype")->nullable();
            $table->string("idx")->nullable();
            $table->string("rounded_total_export")->nullable();
            $table->string("cash_bank_account")->nullable();
            $table->string("convert_into_recurring_invoice")->nullable();
            $table->string("selling_price_list")->nullable();
            $table->string("tc_name")->nullable();
            $table->string("source")->nullable();
            $table->string("charge")->nullable();
            $table->string("notification_email_address")->nullable();
            $table->string("address_display")->nullable();
            $table->string("due_date")->nullable();
            $table->string("write_off_cost_center")->nullable();
            $table->string("invoice_period_to_date")->nullable();
            $table->string("write_off_outstanding_amount_automatically")->nullable();
            $table->string("select_print_heading")->nullable();
            $table->string("is_pos")->nullable();
            $table->string("net_total_export")->nullable();
            $table->string("write_off_amount")->nullable();
            $table->string("mode_of_payment")->nullable();
            $table->string("price_list_currency")->nullable();
            $table->string("contact_display")->nullable();
            $table->string("next_date")->nullable();
            $table->string("terms")->nullable();
            $table->string("other_charges_total_export")->nullable();
            $table->string("aging_date")->nullable();
            $table->string("customer_address")->nullable();
            $table->string("total_commission")->nullable();
            $table->string("contact_mobile")->nullable();
            $table->string("c_form_applicable")->nullable();
            $table->string("customer_group")->nullable();
            $table->string("gross_profit")->nullable();
            $table->string("repeat_on_day_of_month")->nullable();
            $table->string("contact_person")->nullable();
            $table->string("in_words")->nullable();
            $table->string("campaign")->nullable();
            $table->string("fiscal_year")->nullable();
            $table->string("conversion_rate")->nullable();
            $table->string("against_income_account")->nullable();
            $table->string("total_advance")->nullable();
            $table->string("posting_time")->nullable();
            $table->string("customer_name")->nullable();
            $table->string("commission_rate")->nullable();
            $table->string("update_stock")->nullable();
            $table->string("gross_profit_percent")->nullable();
            $table->string("sales_partner")->nullable();
            $table->string("project_name")->nullable();
            $table->string("end_date")->nullable();
            $table->string("company")->nullable();
            $table->string("contact_email")->nullable();
            $table->string("customer")->nullable();
            $table->string("grand_total")->nullable();
            $table->string("territory")->nullable();
            $table->string("is_opening")->nullable();
            $table->string("posting_date")->nullable();
            $table->string("debit_to")->nullable();
            $table->string("naming_series")->nullable();
            $table->string("other_charges_total")->nullable();
            $table->string("currency")->nullable();
            $table->string("letter_head")->nullable();
            $table->string("recurring_id")->nullable();
            $table->string("shipping_rule")->nullable();
            $table->string("paid_amount")->nullable();
            $table->string("amended_from")->nullable();
            $table->string("recurring_type")->nullable();
            $table->string("rounded_total")->nullable();
            $table->string("grand_total_export")->nullable();
            $table->string("write_off_account")->nullable();
            $table->string("outstanding_amount")->nullable();
            $table->string("in_words_export")->nullable();
            $table->string("remarks")->nullable();
            $table->string("invoice_period_from_date")->nullable();
            $table->string("c_form_no")->nullable();
            $table->string("plc_conversion_rate")->nullable();
            $table->string("net_total")->nullable();
            $table->string("additional_discount_amount")->nullable();
            $table->string("additional_discount_percentage")->nullable();
            $table->string("apply_additional_discount_on")->nullable();
            $table->string("pos_reference")->nullable();
            $table->string("account_for_change_amount")->nullable();
            $table->string("change_amount")->nullable();
            $table->string("esal_status")->nullable();
            $table->string("ecollect_status")->nullable();
            $table->string("sync_submit_error")->nullable();
            $table->string("expected_delivery_date")->nullable();
            $table->string("special_billing_agreement")->nullable();
            $table->string("special_billing_options")->nullable();
            $table->string("invoice_type")->nullable();
            $table->string("actual_delivery_date")->nullable();
            $table->string("special_transaction_type")->nullable();
            $table->string("special_transaction_type_options")->nullable();
            $table->string("outstanding_amount_after_returns")->nullable();
            $table->string("special_tax_treatment")->nullable();
            $table->text("qrcode_base64")->nullable();
            $table->string("rent_contract_payment")->nullable();
            $table->string("ignore_taxes")->nullable();
            $table->string("uuid")->nullable();
            $table->string("shift_log")->nullable();
            $table->string("total_points")->nullable();
            $table->string("apply_loyalty_discount")->nullable();
            $table->string("apply_loyalty_discount_on")->nullable();
            $table->string("points_to_use")->nullable();
            $table->string("loyalty_discount")->nullable();
            $table->string("repeated_from")->nullable();
            $table->string("warehouse")->nullable();
            $table->string("barcode")->nullable();
            $table->string("pos_settings")->nullable();
            $table->string("doctype")->nullable();
            $table->timestamps();
        });

        Schema::connection('mongodb')->create('dafater_sales_invoice_items', function (Blueprint $table) {
            $table->primary("name");
            $table->foreignId("dafater_sales_invoice_id")->constrained("dafater_sales_invoices");
            $table->string("doctype")->nullable();
            $table->string("owner")->nullable();
            $table->string("docstatus")->nullable();
            $table->string("creation")->nullable();
            $table->string("modified")->nullable();
            $table->string("modified_by")->nullable();
            $table->string("parent")->nullable();
            $table->string("parentfield")->nullable();
            $table->string("parenttype")->nullable();
            $table->string("idx")->nullable();
            $table->string("serial_no")->nullable();
            $table->string("qty")->nullable();
            $table->string("item_tax_rate")->nullable();
            $table->string("delivery_note")->nullable();
            $table->string("dn_detail")->nullable();
            $table->string("cost_center")->nullable();
            $table->string("so_detail")->nullable();
            $table->string("adj_rate")->nullable();
            $table->string("actual_qty")->nullable();
            $table->string("page_break")->nullable();
            $table->string("income_account")->nullable();
            $table->string("item_name")->nullable();
            $table->string("stock_uom")->nullable();
            $table->string("warehouse")->nullable();
            $table->string("basic_rate")->nullable();
            $table->string("ref_rate")->nullable();
            $table->string("description")->nullable();
            $table->string("brand")->nullable();
            $table->string("barcode")->nullable();
            $table->string("item_code")->nullable();
            $table->string("buying_amount")->nullable();
            $table->string("time_log_batch")->nullable();
            $table->string("expense_account")->nullable();
            $table->string("delivered_qty")->nullable();
            $table->string("export_rate")->nullable();
            $table->string("sales_order")->nullable();
            $table->string("item_group")->nullable();
            $table->string("export_amount")->nullable();
            $table->string("amount")->nullable();
            $table->string("customer_item_code")->nullable();
            $table->string("batch_no")->nullable();
            $table->string("base_ref_rate")->nullable();
            $table->string("net_amount_export")->nullable();
            $table->string("net_amount")->nullable();
            $table->string("return_note")->nullable();
            $table->string("adj_val")->nullable();
            $table->string("taxes_amount")->nullable();
            $table->string("grand_amount_including_taxes")->nullable();
            $table->string("item_excluded_from_taxes")->nullable();
            $table->string("is_fixed_asset")->nullable();
            $table->string("asset")->nullable();
        });

        Schema::connection('mongodb')->create('dafater_sales_invoice_charges', function (Blueprint $table) {
            $table->primary("name");
            $table->string("doctype")->nullable();
            $table->string("owner")->nullable();
            $table->string("docstatus")->nullable();
            $table->string("creation")->nullable();
            $table->string("modified")->nullable();
            $table->string("modified_by")->nullable();
            $table->string("parent")->nullable();
            $table->string("parentfield")->nullable();
            $table->string("parenttype")->nullable();
            $table->string("idx")->nullable();
            $table->string("charge_type")->nullable();
            $table->string("tax_amount")->nullable();
            $table->string("description")->nullable();
            $table->string("item_wise_tax_detail")->nullable();
            $table->string("row_id")->nullable();
            $table->string("included_in_print_rate")->nullable();
            $table->string("rate")->nullable();
            $table->string("account_head")->nullable();
            $table->string("total")->nullable();
            $table->string("cost_center")->nullable();
            $table->string("abbr")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('dafater_sales_invoices');
        Schema::connection('mongodb')->dropIfExists('dafater_sales_invoice_charges');
        Schema::connection('mongodb')->dropIfExists('dafater_sales_invoice_items');
    }
}
