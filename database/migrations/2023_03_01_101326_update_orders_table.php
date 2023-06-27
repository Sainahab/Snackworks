<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['billing_city', 'billing_state','billing_zip','shipping_address','shipping_city','shipping_state','shipping_zip','billing_country','shipping_country']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table)
		{
			
		
			$table->mediumText('billing_city')->nullable();
			$table->mediumText('billing_state')->nullable();
			$table->mediumText('billing_zip')->nullable();
			$table->text('shipping_address')->nullable();
			$table->text('shipping_city')->nullable();
			$table->text('shipping_state')->nullable();
			$table->text('shipping_zip')->nullable();
		
			$table->text('billing_country')->nullable();
			$table->text('shipping_country')->nullable();
		});
    }
}
