@layout('layout.main')

@section('content')

<h4>{{ __('pieko.common.admin') }} &raquo; {{ ucf(__('pieko.common.create').' '.__('pieko.model.product.singular')) }}</h4>

<?php


echo Form::horizontal_open();

echo Form::control_group(
    Form::label('name', __('pieko.model.product.name')),
    Form::xlarge_text('name', Input::old('name')),
    $errors->has('name') ? 'error' : '',
    Form::block_help($errors->first('name'))
);

echo Form::control_group(
    Form::label('price', __('pieko.model.product.price')),
    Form::prepend(Form::mini_text('price', Input::old('price'), array('placeholder' => '0.00')), __('pieko.currency')),
    $errors->has('price') ? 'error' : '',
    Form::block_help($errors->first('price'))
);

echo Form::control_group(
    Form::label('shop_id', __('pieko.model.shop.singular')),
    Form::select('shop_id', $shops, Input::old('shop_id')),
    $errors->has('shop_id') ? 'error' : '',
    Form::block_help($errors->first('shop_id'))
);

echo Form::control_group(
    Form::label('submit', ''),
    Form::submit(__('pieko.form.submit'))
);

echo Form::close();
?>
@endsection