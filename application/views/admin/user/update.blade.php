@layout('layout.main')

@section('content')

<h4>{{ __('pieko.common.admin') }} &raquo; {{ __('pieko.admin.updateuser') }}</h4>

<?php


Log::write('errors', var_export($errors, true));

echo Form::horizontal_open();

echo Form::control_group(
    Form::label('firstname', __('pieko.user.firstname')),
    Form::xlarge_text('firstname', Input::old('firstname', $user->firstname)),
    $errors->has('firstname') ? 'error' : '',
    Form::block_help($errors->first('firstname'))
);

echo Form::control_group(
    Form::label('lastname', __('pieko.user.lastname')),
    Form::xlarge_text('lastname', Input::old('lastname', $user->lastname)),
    $errors->has('lastname') ? 'error' : '',
    Form::block_help($errors->first('lastname'))
);

echo Form::control_group(
    Form::label('email', __('pieko.user.email')),
    Form::xlarge_text('email', Input::old('email', $user->email)),
    $errors->has('email') ? 'error' : '',
    Form::block_help($errors->first('email'))
);

echo Form::control_group(
    Form::label('password', __('pieko.user.password')),
    Form::xlarge_text('password', Input::old('password')),
    $errors->has('password') ? 'error' : '',
    Form::block_help($errors->first('password'))
);

echo Form::control_group(
    Form::label('roles', __('pieko.role.plural')),
    Form::multiselect('roles[]', $roles, Input::old('roles', $user->roles_array()))
);

echo Form::submit(__('pieko.form.submit'));
echo Form::close();
?>
@endsection