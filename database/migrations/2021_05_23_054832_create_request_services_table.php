<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_services', function (Blueprint $table) {
            $table->id('request_id');
            $table->integer('cust_id');
            $table->integer('rider_id')->nullable();

            $table->string('product_name');
            $table->string('dmg_info');
            $table->string('pickup_address');
            $table->string('delivery_address');

            $table->time('pickup_time');
            $table->date('pickup_date');

            $table->string('request_status')->nullable()->default('Unapproved');

            $table->string('pickup_status')->nullable()->default('Unaccepted');

            $table->string('delivery_status')->nullable();
            $table->string('repair_status');

            $table->string('reason');

            $table->float('cost')->nullable();
            $table->string('payment_status')->nullable()->default('Unpaid');;
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
        Schema::dropIfExists('request_services');
    }
}
