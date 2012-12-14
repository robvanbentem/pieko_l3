<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 5:53 PM
 * @package Unifact
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{ Asset::container('bootstrapper')->styles(); }}
    {{ Asset::container('bootstrapper')->scripts(); }}
    {{ HTML::style('/css/site.css') }}
    {{ HTML::style('/css/main.css') }}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

@include('partial.main.navigation')



<div class="container">

    @section('content')
    @yield_section

</div> <!-- /container -->

@include('partial.main.footer')

</body>
</html>
