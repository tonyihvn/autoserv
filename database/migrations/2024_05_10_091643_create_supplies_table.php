<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_id')->constrained('parts')->onDelete('cascade');
<<<<<<< HEAD
            $table->integer('quantity_supplied');
            $table->string('supplier_name');
            $table->string('phone_number')->nullable();
            $table->date('date_supplied');
            $table->string('batch_no')->nullable();
            $table->boolean('payment_made')->default(false);
=======
            $table->double('quantity_supplied',10,2)->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('date_supplied')->nullable();
            $table->string('batch_no')->nullable();
            $table->double('payment_made',10,2)->nullable();
>>>>>>> master
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
        Schema::dropIfExists('supplies');
    }
}
