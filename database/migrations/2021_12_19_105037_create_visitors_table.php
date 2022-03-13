<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();           	
            $table->string('page');//manually added	
            $table->string('userip');//manually added	
            $table->string('country');//manually added
            $table->string('city');//manually added	
            $table->string('countrycode');//manually added
            $table->string('latitude');//manually added
            $table->string('longitude');//manually added	
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
