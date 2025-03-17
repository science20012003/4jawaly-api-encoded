<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountUniviedInvitaions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $get_all = \App\Model\AccountUnifiedInvitation::all();
        \App\Model\AccountUnifiedInvitation::query()->truncate();
        Schema::table('account_unified_invitations', function (Blueprint $table) {
            $table->foreignId("from_account_id")->constrained("accounts");
        });
        foreach ($get_all as $s){
            \App\Model\AccountUnifiedInvitation::create([
                'hawsabah_request_id'=>$s->hawsabah_request_id,
                'account_id'=>$s->account_id,
                'from_account_id'=>$s->hawsabahRequest->account_id,
                'status'=>$s->status,
                'user_id'=>$s->user_id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_unified_invitations', function (Blueprint $table) {
            $table->dropForeign("account_unified_invitations_from_account_id_foreign");
        });
    }
}
