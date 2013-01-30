<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 5:57 PM
 */

?><div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="{{ URL::to_action('home') }}">{{ Config::get('pieko.appname') }}</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="{{ Helper::active_class('home') }}"><a href="{{ URL::to_action('home') }}">Home</a></li>
                </ul>

            </div>

            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <li><a id="toolbar_pick_date" href="#pick-date">
                        <?php echo Session::instance()->get('date', date('Y-m-d')) ?> <span class="icon icon-white icon-calendar"></span>
                    </a></li>
                    @if( Auth::user()->has_role('admin'))
                    <li><a href="{{ URL::to_action('admin') }}">{{ __('pieko.common.admin') }}</a></li>
                    @endif
                    <li><a href="{{ URL::to_action('account') }}">{{ Auth::user()->fullname() }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>