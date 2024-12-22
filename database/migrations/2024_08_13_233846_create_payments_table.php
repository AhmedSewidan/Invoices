<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->id('id');
			$table->unsignedBigInteger('invoice_id');
			$table->datetime('payment_date')->default(null);
			$table->enum('payment_method', array('fawry', 'vodafone-cash', 'vesa', 'paypal', 'upon-delivary'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}