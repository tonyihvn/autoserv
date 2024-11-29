<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('customerid')->nullable();
            $table->string('jobno')->unique();
            $table->string('description')->nullable();
            $table->string('dated')->nullable();
            $table->string('status')->nullable();
=======

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('customerid',30)->nullable();
            $table->string('vregno',30)->nullable();
            $table->string('jobno')->unique();
            $table->string('description')->nullable();
            $table->string('dated')->nullable();
            $table->string('status',30)->nullable();
>>>>>>> master
            $table->float('amount', 12, 2)->default(0);
            $table->float('labour', 12, 2)->default(0);
            $table->float('discount', 12, 2)->default(0);
            $table->float('sundry', 12, 2)->default(0);
            $table->float('vat', 12, 2)->default(0);
            $table->integer('jid')->nullable();
<<<<<<< HEAD
            $table->timestamps();

            $table->foreign('customerid')->references('customerid')->on('contacts')->onDelete('cascade');            
=======
            $table->string('delivered_by',30)->nullable();
            $table->string('odometer',30)->nullable();
            $table->date('next_due')->nullable();
            $table->timestamps();

            $table->foreign('customerid')->references('customerid')->on('contacts')->onDelete('cascade');
>>>>>>> master
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
