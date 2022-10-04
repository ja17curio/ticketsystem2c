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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('customer_id')
                ->references('id')
                ->on('customers');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('order_id')
                ->references('id')
                ->on('orders');

            $table->foreignId('event_id')
            ->references('id')
            ->on('events');
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
