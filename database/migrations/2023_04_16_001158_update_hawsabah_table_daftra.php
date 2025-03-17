<?php

use App\Custom\Daftra\Products\Model;
use App\Custom\Daftra\Products\Repo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHawsabahTableDaftra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->tinyInteger("approve_via")->default(1)->after("deposit_date");
        });

        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->tinyInteger("approve_via")->default(1)->after("deposit_date");
        });

        Schema::table('ticket_tags', function (Blueprint $table) {
            $table->unsignedBigInteger("daftra_id")->nullable()->after("name_en");
        });
        if(app()->environment() == "production") {
            $d = new \App\Custom\Daftra\Products\Repo();
            foreach (\App\Model\TicketTag::whereIn("id", [1, 2])->whereNull('daftra_id')->get() as $item) {
                $m = new Model();
                $m->name = $item->name_ar;
                $m->description = "$item->name_ar";
                $m->unit_price = 200;
                $m->tax1 = \App\Custom\Daftra\Taxes\Repo::TAX_ID;
                $m->brand = "senders";
                $m->product_code = "tick_tag_" . $item->id;
                $m->buy_price = 200;
                $m->deactivate = 0;
                $m->type = Model::SERVICE;
                $res = $d->add($m);
                if ($res[0]) {
                    $id = $res[1]["id"] ?? null;
                    if (!empty($id)) {
                        $item->daftra_id = $id;
                        try {
                            $item->save();
                            echo "OK";
                        } catch (\PDOException $exception) {
                            echo $exception->getMessage();
                        }
                    } else {
                        echo("لا يمكنك اضافة المنتج ");
                    }
                } else {
                    echo("لا يمكنك اضافة المنتج ");
                }
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
        Schema::table('hawsabah_pays', function (Blueprint $table) {
            $table->dropColumn("approve_via");
        });

        Schema::table('hawsabah_renew_pays', function (Blueprint $table) {
            $table->dropColumn("approve_via");
        });

        Schema::table('ticket_tags', function (Blueprint $table) {
            $table->dropColumn("daftra_id");
        });
    }
}
