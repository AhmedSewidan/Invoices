<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('invoices', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('invoice_id')->references('id')->on('invoices')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_role', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::table('invoices', function(Blueprint $table) {
			$table->dropForeign('invoices_user_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_invoice_id_foreign');
		});
	}
}