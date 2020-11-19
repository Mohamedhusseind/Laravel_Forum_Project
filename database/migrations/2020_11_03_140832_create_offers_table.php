<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            {
                    $table->string('name_ar');
                    $table->string('name_en');
                    $table->string('price');
                    $table->string('photo');
                    $table->string('details_ar');
                    $table->string('details_en');
                    $table->rememberToken();
                    $table->timestamps();

            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            //
        });
    }
}


