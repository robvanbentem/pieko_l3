{{ Table::open() }}
{{ Table::headers('#', (string)__('pieko.model.user.firstname'), (string)__('pieko.model.user.lastname'), (string)__('pieko.model.user.email'), (string)__('pieko.model.user.enabled')) }}
{{ Table::body($body) }}
{{ Table::close() }}

{{ Button::link(URL::to_action('admin@user', array('create')), ucf(__('pieko.common.create').' '.__('pieko.model.user.singular'))); }}