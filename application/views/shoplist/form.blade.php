<form class="form form-inline" action="{{ URL::to_action('shoplist@add') }}">
    {{ Form::span3_select('shop_id', $shared_shops); }}
    {{ Form::span2_select('shop_id', $amounts, $default_amount); }}
    {{ Form::span6_text('product') }}
    {{ Button::primary_submit('<span class="icon icon-white icon-shopping-cart"></span>') }}
</form>