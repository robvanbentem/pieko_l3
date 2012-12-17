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
            </div><!--/.nav-collapse -->

            <div class="nav-collapse collapse pull-right">
                <ul class="nav">
                    <li><a href="{{ URL::to_action('account') }}">{{ Auth::user()->fullname() }}</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>