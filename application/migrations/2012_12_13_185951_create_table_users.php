<?php

class Create_Table_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function($table)
        {
            $table->engine = 'InnoDB';

            $table->create();
            $table->increments('id');
            $table->string('email', 128)->unique();;
            $table->string('password', 128);
            $table->string('firstname', 32)->nullable()->default(null);
            $table->string('lastname', 64)->nullable()->default(null);
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });

        User::create(array(
            'email' => 'admin@domain.com',
            'password' => Hash::make('changeme'),
            'firstname' => 'Admin',
            'lastname' => 'i Strator'
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

}