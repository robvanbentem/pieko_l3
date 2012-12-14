<?php

class Auth_Controller extends Base_Controller {

	public function action_index()
	{
		if(Auth::user()){ // already logged in
            return Redirect::to_action('home');
        }

		return View::make('auth.index');
	}

	public function action_login()
	{
        $credentials = array('username' => Input::get('email'), 'password' => Input::get('password'), 'remember' => Input::get('remember'));

        if (Auth::attempt(Input::all()))
        {
            return Redirect::to_action('home');
        } else {
            return Redirect::to_action('auth')
                ->with_input()
                ->with('fail', true);
        }
	}

	public function action_logout()
	{
        Auth::logout();

        return Redirect::to_action('auth')
            ->with('logout', true);
	}

}
