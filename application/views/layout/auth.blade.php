<?php

/**
 * @author Rob van Bentem.
 * @when 17-12-2012 4:15 PM
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign in &middot; {{ Config::get('pieko.appname') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{ Asset::container('bootstrapper')->styles(); }}
    {{ Asset::container('bootstrapper')->scripts(); }}
    {{ HTML::style('/css/auth.css') }}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    @section('content')
    @yield_section

</div>
<!-- /container -->
</body>
</html>