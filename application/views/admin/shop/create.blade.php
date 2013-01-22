@layout('layout.main')

@section('content')

<h4>{{ __('pieko.common.admin') }} &raquo; {{ ucf(__('pieko.common.create').' '.__('pieko.model.shop.singular')) }}</h4>

<?php


echo Form::horizontal_open();

echo Form::control_group(
    Form::label('firstname', __('pieko.model.shop.name')),
    Form::xlarge_text('name', Input::old('name')),
    $errors->has('name') ? 'error' : '',
    Form::block_help($errors->first('name'))
);

echo Form::control_group(
    Form::label('firstname', __('pieko.model.shop.name_short')),
    Form::xlarge_text('name_short', Input::old('name_short')),
    $errors->has('name_short') ? 'error' : '',
    Form::block_help($errors->first('name_short'))
);

echo Form::control_group(
    Form::label('color', __('pieko.model.shop.color')),
    Form::xlarge_text('color', Input::old('color')),
    $errors->has('color') ? 'error' : '',
    Form::block_help($errors->first('color'))
);

echo Form::control_group(
    Form::label('description', __('pieko.model.shop.description')),
    Form::textarea('description', Input::old('description'), array('style' => 'width: 400px;')),
    $errors->has('description') ? 'error' : '',
    Form::block_help($errors->first('description'))
);

echo Form::control_group(
    Form::label('description', ''),
    Form::submit(__('pieko.form.submit'))
);

echo Form::close();
?>
@endsection