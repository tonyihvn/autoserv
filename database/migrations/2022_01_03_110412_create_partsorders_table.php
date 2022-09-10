<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partsorders', function (Blueprint $table) {
            $table->id();
            $table->string('customerid')->nullable();
            $table->string('jobno')->nullable();
            $table->string('partsname')->nullable();
            $table->string('partsno')->nullable();
            $table->string('quantity')->nullable();
            $table->float('amount',12,2)->default(0);
            $table->string('pdate')->nullable();
            $table->string('pid')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('partsorders');
    }
}
