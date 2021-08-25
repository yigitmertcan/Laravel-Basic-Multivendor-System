<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Merchdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('info');
            $table->string('websitesi');
            $table->string('vergi_id');
            $table->string('fin_inst');
            $table->string('bus_gro');
            $table->string('bank_iban');
            $table->string('bank_acco');
            $table->string('tax_office');
            $table->string('phone');
            $table->string('city');
            $table->string('country');
            $table->string('adress');
            $table->string('code')->unique();
            $table->string('contract_serial_id');
            $table->string('type');
            $table->bool('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant', function (Blueprint $table) {
            //
        });
    }
}
