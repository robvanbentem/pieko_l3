{{ Table::open() }}
{{ Table::headers('#', (string)__('pieko.model.shop.name'), (string)__('pieko.model.shop.name_short')) }}
{{ Table::body($body) }}
{{ Table::close() }}

{{ Button::link(URL::to_action('admin@shop', array('create')), ucf(__('pieko.common.create').' '.__('pieko.model.shop.singular'))); }}