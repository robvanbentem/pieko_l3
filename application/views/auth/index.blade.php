@layout('layout.auth')


@section('content')
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
@endsection