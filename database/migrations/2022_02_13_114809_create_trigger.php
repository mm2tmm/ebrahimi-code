<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER `tr_currency_fee`
                BEFORE INSERT ON `currencies` FOR EACH ROW
                    BEGIN
                        IF NEW.fee<0 OR NEW.fee>100 THEN
                            CALL `Error: Wrong values for fee`;
                        END IF;
                    END
        ");
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_currency_fee`');
    }
}
