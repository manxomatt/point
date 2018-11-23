<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chart_of_account_id');
            $table->string('code')->nullable()->unique();
            $table->string('barcode')->nullable()->unique();
            $table->string('name');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('weight')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('taxable')->default(true);
            $table->boolean('disabled')->default(false);
            $table->unsignedInteger('stock_reminder')->default(0);
            $table->unsignedInteger('unit_default')->nullable();
            $table->unsignedInteger('unit_default_purchase')->nullable();
            $table->unsignedInteger('unit_default_sales')->nullable();

            $table->unsignedInteger('created_by')->index()->nullable();
            $table->unsignedInteger('updated_by')->index()->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts')->onDelete('restrict');
            $table->foreign('unit_default')->references('id')->on('item_unit_id')->onDelete('set null');
            $table->foreign('unit_default_purchase')->references('id')->on('item_unit_id')->onDelete('set null');
            $table->foreign('unit_default_sales')->references('id')->on('item_unit_id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
