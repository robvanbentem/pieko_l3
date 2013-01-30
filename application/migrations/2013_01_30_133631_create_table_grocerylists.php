<?php

class Create_Table_Grocerylists {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('grocerylists', function($table)
        {
            $table->engine = 'InnoDB';

            $table->create();

            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();

            $table->decimal('amount', 5, 2);
            $table->date('date');

            $table->boolean('bought')->default(false);
            $table->boolean('filled')->default(false);

            $table->timestamps();

            $table->index('user_id');
            $table->index('product_id');

            $table->foreign('user_id')->references('id')->on('users')->on_delete('set null');
            $table->foreign('product_id')->references('id')->on('products')->on_delete('set null');
        });

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grocerylists');
	}

}