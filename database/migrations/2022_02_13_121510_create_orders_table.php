<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\cu;
use Database\Seeders\CorrencySeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\WalletSeeder;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('currency_id');
            $table->double('amount');
            $table->double('fee');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('currency_id')->references('id')->on('currencies');


            // run seeders
            $seeder = new CorrencySeeder();
            $seeder->run();
            $seeder = new WalletSeeder();
            $seeder->run();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
