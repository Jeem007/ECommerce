<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('country_name')->nullable();
            $table->string('zipCode')->nullable(); 
            $table->timestamp('order_date')->nullable(); 

            $table->unsignedInteger('amount')->nullable(); 
            $table->unsignedInteger('shipping_amount')->nullable(); 
            $table->string('transaction_id')->nullable(); 
            $table->string('currency')->nullable(); 
            $table->string('status')->nullable(); 
            

          
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
