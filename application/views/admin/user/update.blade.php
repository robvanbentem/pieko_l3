@layout('layout.main')

@section('content')

<h4>{{ __('pieko.common.admin') }} &raquo; {{ ucf(__('pieko.common.update').' '.__('pieko.model.user.singular')) }}</h4>

<?php


Log::write('errors', var_export($errors, true));

echo Form::horizontal_open();

echo Form::control_group(
    Form::label('firstname', __('pieko.model.user.firstname')),
    Form::xlarge_text('firstname', Input::old('firstname', $user->firstname)),
    $errors->has('firstname') ? 'error' : '',
    Form::block_help($errors->first('firstname'))
);

echo Form::control_group(
    Form::label('lastname', __('pieko.model.user.lastname')),
    Form::xlarge_text('lastname', Input::old('lastname', $user->lastname)),
    $errors->has('lastname') ? 'error' : '',
    Form::block_help($errors->first('lastname'))
);

echo Form::control_group(
    Form::label('email', __('pieko.model.user.email')),
    Form::xlarge_text('email', Input::old('email', $user->email)),
    $errors->has('email') ? 'error' : '',
    Form::block_help($errors->first('email'))
);

echo Form::control_group(
    Form::label('password', __('pieko.model.user.password')),
    Form::xlarge_text('password', Input::old('password')),
    $errors->has('password') ? 'error' : '',
    Form::block_help($errors->first('password'))
);

echo Form::control_group(
    Form::label('enabled', __('pieko.model.user.enabled')),
    Form::checkbox('enabled', 1, Input::old('enabled', $user->enabled)),
    $errors->has('enabled') ? 'error' : '',
    Form::block_help($errors->first('enabled'))
);

echo Form::control_group(
    Form::label('roles', __('pieko.model.role.plural')),
    Form::multiselect('roles[]', $roles, Input::old('roles', $user->roles_array()))
);

echo Form::submit(__('pieko.form.submit'));
echo Form::close();
?>
@endsection