<?php

use App\Model\AccountCommercialRecord;
use App\Model\AccountInvoice;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_invoices', function (Blueprint $table) {
            $table->foreignId("account_commercial_record_id")->after("client_secondary_country_id")->nullable()->constrained("account_commercial_records");
        });
        foreach (AccountInvoice::all() as $invoice) {
            $first =     AccountCommercialRecord::where("account_id",$invoice->account_id)->where("status",1)
                ->whereNotNull("cr_number")
                ->where('expiry_date', '>=', Carbon::now())->first();
            if($first){
            $invoice->account_commercial_record_id = $first->id;
            $invoice->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_invoices', function (Blueprint $table) {
            $table->dropForeign('account_invoices_account_commercial_record_id_foreign');
            $table->dropColumn("account_commercial_record_id");
        });
    }
}
