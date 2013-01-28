{{ Table::open() }}
{{ Table::headers('#', (string)__('pieko.model.product.name'), (string)__('pieko.model.product.price'), (string)__('pieko.model.shop.singular')) }}
{{ Table::body($body) }}
{{ Table::close() }}

{{ Button::link(URL::to_action('admin@product@create'), ucf(__('pieko.common.create').' '.__('pieko.model.product.singular'))); }}