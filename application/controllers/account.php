<?php

/**
 * @author Rob van Bentem.
 * @when 18-12-2012 10:09 AM
 */
class Account_Controller extends App_Controller
{
    public function action_index(){
        return View::make('account.index');
    }
}
