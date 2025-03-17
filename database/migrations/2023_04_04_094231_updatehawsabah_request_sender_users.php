<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatehawsabahRequestSenderUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_request_sender_users', function (Blueprint $table) {
            $table->foreignId("account_id")->after("username")->nullable()->constrained("accounts")->onDelete("CASCADE");
        });
        \App\Model\HawsabahRequestSenderUser::where("source",'!=',\App\Model\HawsabahRequest::SOURCE_4JAWALYCOM)->delete();
        foreach (\App\Model\HawsabahRequestSenderUser::all() as $item){
            $account = \App\Model\Account::where("email",$item->username)->first();
            if($account){
                $item->account_id = $account->id;
                $item->save();
            }else{
                $item->delete();
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
        Schema::table('hawsabah_request_sender_users', function (Blueprint $table) {
            $table->dropForeign("account_id");
        });
    }
}
