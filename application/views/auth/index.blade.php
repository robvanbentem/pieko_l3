<?php

/**
 * @author Rob van Bentem.
 * @when 14-12-2012 5:22 PM
 * @package Unifact
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
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

    <?php

    echo Form::horizontal_open(URL::to_action('auth@login'), 'post', array('class' => 'form-signin'));

    echo '<h2 class="form-signin-heading">Login</h2>';

    echo Form::text('username', Input::old('username'), array(
        'placeholder' => 'Email',
        'class' => 'input-block-level'
    ));
    echo Form::password('password', array(
        'class' => 'input-block-level',
        'placeholder' => 'Password'

    ));
    echo Form::labelled_checkbox('remember', 'Remember me?');
    echo Button::primary_submit('Login');

    echo Form::close();

    ?>

</div>
<!-- /container -->
</body>
</html>
