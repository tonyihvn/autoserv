<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsfusTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psfus', function (Blueprint $table) {
            $table->id();
            $table->string('customerid')->nullable();
            $table->string('vregno')->nullable();
            $table->string('jobno')->nullable();
            $table->string('psfudate')->nullable();
            $table->string('discussion')->nullable();
            $table->string('outcome')->nullable();
            $table->string('status')->nullable();
            $table->foreign('customerid')->references('customerid')->on('contacts')->onDelete('cascade');
            $table->foreign('jobno')->references('jobno')->on('jobs')->onDelete('cascade');

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
        Schema::dropIfExists('psfus');
    }
}
