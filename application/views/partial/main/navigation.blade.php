<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 5:57 PM
 * @package Unifact
 */

?><div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">{{ Config::get('pieko.appname') }}</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="{{ URL::to_action('home') }}">Home</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>