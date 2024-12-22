<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration {

	public function up()
	{
		Schema::create('invoices', function(Blueprint $table) {
			$table->id('id');
			$table->unsignedBigInteger('user_id');
			$table->string('invoice_number', 200)->unique();
			$table->dateTime('due_date');
			$table->dateTime('invoice_date');
			$table->text('description')->default(null);
			$table->decimal('discount', 5, 4)->default(null);
			$table->decimal('tax', 5, 4)->default(null);
			$table->decimal('amount');
			$table->enum('status', array('paid', 'unpaid', 'canceled'));
            $table->timestamp('status_date')->nullable(true);
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invoices');
	}
}