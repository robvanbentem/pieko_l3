<?php

class Create_Product_Shop {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('shops', function ($table) {
            $table->engine = 'InnoDB';

            $table->create();

            $table->increments('id');
            $table->string('name', 128)->unique();
            $table->string('name_short', 128)->unique();
            $table->string('color', 8);
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('products', function ($table) {
            $table->engine = 'InnoDB';

            $table->create();

            $table->increments('id');
            $table->string('name', 256);
            $table->timestamps();
        });

        Schema::table('product_shop', function ($table) {
            $table->engine = 'InnoDB';

            $table->create();

            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('shop_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->on_update('CASCADE')->on_delete('CASCADE');
            $table->foreign('shop_id')->references('id')->on('shops')->on_update('CASCADE')->on_delete('CASCADE');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_shop');
		Schema::drop('shops');
		Schema::drop('products');
	}

}