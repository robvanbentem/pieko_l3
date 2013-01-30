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
            $table->decimal('price', 5, 2)->nullable()->default(null);
            $table->timestamps();
        });

        Shop::create(array(
            'name' => 'Supermarket',
            'name_short' => 'Super',
            'color' => '#66FFCC',
            'description' => 'The local supermarket'
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
    {
        Schema::drop('products');
        Schema::drop('shops');
	}

}