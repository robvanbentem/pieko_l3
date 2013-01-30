<?php

class Home_Controller extends App_Controller {

	public function action_index()
	{
		return View::make('home.index', array(
            'amounts' => Config::get('pieko.amounts'),
            'default_amount' => Config::get('pieko.default_amount'),
        ));
	}

    public function action_date($timestamp)
    {
        $redirect = Input::get('redir');
        $timestamp = ($timestamp / 1000) + 86400 - ($timestamp / 1000 % 86400);

        Session::instance()->put('date', date('Y-m-d', $timestamp));
        return Redirect::to($redirect);
    }
}