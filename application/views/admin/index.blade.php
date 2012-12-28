@layout('layout.main')

@section('content')
<h3>{{ __('pieko.common.admin') }}</h3>
<?php

echo Tabbable::tabs_left(
    Navigation::links(
        array(
            array(
                __('pieko.admin.tab.users'),
                $users,
                true
            ),
            array(
                __('pieko.admin.tab.shops'),
                "<p>Howdy, I'm in Section 2.</p>"
            ),
            array(
                __('pieko.admin.tab.products'),
                "<p>What up girl, this is Section 3.</p>"
            ),
        )
    )
);

?>
@endsection