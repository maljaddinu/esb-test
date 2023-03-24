<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('invoice_id');
            $table->string('invoice_subject');
            $table->date('invoice_expiry');
            $table->smallInteger('invoice_status')->comment('1. unpaid, 2.paid')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('service_code',20);
            $table->string('service_name');
            $table->float('service_price');
            $table->smallInteger('service_type')->comment('1. Service, 2. Goods, 9.tax');
            $table->timestamps();
        });
        
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('address_id');
            $table->string('address_recipient_name');
            $table->string('address_location');
            $table->timestamps();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('invoice_item_id');
            $table->bigInteger('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices');
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->float('invoice_item_qty');
            $table->float('invoice_item_amount');
            $table->timestamps();
        });

        Schema::create('delivery_orders',function(Blueprint $table){
            $table->bigIncrements('delivery_order_id');
            $table->bigInteger('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices');
            $table->bigInteger('address_destination')->unsigned();
            $table->foreign('address_destination')->references('address_id')->on('addresses');
            $table->bigInteger('address_sender')->unsigned();
            $table->foreign('address_sender')->references('address_id')->on('addresses');
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
        //
    }
};
