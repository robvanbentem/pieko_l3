<?php

class Create_Roles_Tables
{

    /**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function ($table) {
            $table->engine = 'InnoDB';

            $table->create();

            $table->increments('id');
            $table->string('name', 128)->unique();
            $table->text('description');
            $table->timestamps();
        });

        Role::create(array(
            'name' => 'login',
            'description' => 'User can login'
        ));

        Role::create(array(
            'name' => 'admin',
            'description' => 'User can administrate'
        ));

        Schema::table('user_roles', function ($table) {
            $table->engine = 'InnoDB';

            $table->create();

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->on_update('CASCADE')->on_delete('CASCADE');
            $table->foreign('role_id')->references('id')->on('roles')->on_update('CASCADE')->on_delete('CASCADE');
            ;
        });

        DB::table('user_roles')->insert(array(
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));

        DB::table('user_roles')->insert(array(
            'user_id' => 1,
            'role_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
    }

    /**
     * Revert the changes to the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_roles');
        Schema::drop('roles');
    }

}