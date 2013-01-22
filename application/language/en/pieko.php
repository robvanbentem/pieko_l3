<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 6:11 PM
 */

return array(
    'welcome' => 'Welcome :name! Lets spend some money and eat food!',

    'common' => array(
        'admin' => 'Administration',
        'new' => 'New',
        'update' => 'Update',
        'create' => 'Create',
        'edit' => 'Edit',
        'delete' => 'Delete',
    ),


    /*
     * Models
     */
    'model' => array(
        'user' => array(
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'password' => 'Password',
            'email' => 'Email',
            'enabled' => 'Enabled',

            'singular' => 'User',
            'plural' => 'Users'
        ),

        'shop' => array(
            'name' => 'Name',
            'name_short' => 'Name short',
            'color' => 'Color',
            'description' => 'Description',

            'singular' => 'Shop',
            'plural' => 'Shops'
        ),

        'product' => array(
            'name' => 'Name',
            'name_short' => 'Name short',
            'color' => 'Color',
            'description' => 'Description',

            'singular' => 'Product',
            'plural' => 'Products'
        ),

        'role' => array(
            'singular' => 'Role',
            'plural' => 'Roles'
        )
    ),

    'role' => array(
        'singular' => 'Role',
        'plural' => 'Roles'
    ),

    'form' => array(
        'submit' => 'Submit'
    ),

    'admin' => array(
        'tab' => array(
            'users' => 'Users',
            'shops' => 'Shops',
            'products' => 'Products',
        )
    )
);