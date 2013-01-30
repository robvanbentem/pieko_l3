<?php

class Change_Product_Shop {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('products', function ($table) {
            $table->integer('shop_id')->unsigned()->nullable()->default(null);
            $table->index('shop_id');

            $table->foreign('shop_id')->references('id')->on('shops')->on_delete('cascade');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}