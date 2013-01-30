<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 5:20 PM
 */
class App_Controller extends Base_Controller
{
    protected $title = '';

    protected $_js = array();
    protected $_css = array();

    protected function title($title, $prepend = " &middot; ")
    {
        $this->title = $title . ($prepend ? $prepend.$this->title : '');
    }

    public function before(){
        parent::before();

        // Set the date to current date if no date is set
        if(Session::instance()->get('date') === null){
            Session::instance()->set('date', date('Y-m-d'));
        }

        $this->_css[] = '/css/site.css';
        $this->_css[] = '/css/main.css';

        // Bootstrap datepicker: https://github.com/mgussekloo/my-bootstrap-datetimepicker
        $this->_js[] = '/lib/datepicker/datepicker.js';
        $this->_css[] = '/lib/datepicker/datepicker.css';

        $this->_js[] = '/js/site.js';
        $this->_js[] = '/asset/js';

        View::share('_js', $this->_js);
        View::share('_css', $this->_css);


        $this->title(Config::get('pieko.appname'), false);
    }

    public function after($response){
        View::share('shared_title', $this->title);
        View::share('shared_shops', Shop::get_options_array());

        parent::after($response);
    }
}