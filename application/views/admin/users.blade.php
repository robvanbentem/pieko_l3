{{ Table::open() }}
{{ Table::headers('#', 'First Name', 'Last Name', 'Email') }}
{{ Table::body($body) }}
{{ Table::close() }}

{{ Button::link(URL::to_action('admin@user', array('create')), __('pieko.admin.createuser')); }}