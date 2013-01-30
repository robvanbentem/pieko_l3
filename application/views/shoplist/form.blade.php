<form class="form form-inline form-add-product">
    {{ Form::span3_select('shop_id', $shared_shops, null, array('id' => 'gl_shop_id')); }}
    {{ Form::span2_select('amount', $amounts, $default_amount, array('id' => 'gl_amount')); }}
    {{ Form::span6_text('product', null, array('id' => 'gl_product')) }}
    {{ Button::primary_submit('<span class="icon icon-white icon-shopping-cart"></span>') }}
</form>