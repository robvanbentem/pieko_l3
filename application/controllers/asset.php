<?php

/**
 * @author Rob van Bentem.
 * @when 29-01-2013 1:21 PM
 */
class Asset_Controller extends Base_Controller
{
    public function action_js()
    {
        $view = View::make('asset/js', array(
            'date' => Session::instance()->get('date', date('Y-m-d'))
        ));

        $response = Response::make($view, 200, array(
                'Content-Type' => 'application/javascript',
            )
        );

        $response->send_headers();
        return $response;
    }
}