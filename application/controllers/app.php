<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 5:20 PM
 */
class App_Controller extends Base_Controller
{
    protected $title = '';

    protected function title($title, $prepend = " &middot; ")
    {
        $this->title = $title . ($prepend ? $prepend.$this->title : '');
    }

    public function before(){
        parent::before();

        $this->title(Config::get('pieko.appname'), false);
    }

    public function after($response){
        View::share('shared_title', $this->title);

        parent::after($response);
    }
}