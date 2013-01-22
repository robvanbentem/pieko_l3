@layout('layout.main')

@section('content')
<h3>{{ __('pieko.common.admin') }}</h3>
<?php

echo Tabbable::tabs_left(
    Navigation::links(
        array(
            array(
                __('pieko.model.user.plural'),
                $users,
                true
            ),
            array(
                __('pieko.model.shop.plural'),
                $shops
            ),
            array(
                __('pieko.model.product.plural'),
                "<p>What up girl, this is Section 3.</p>"
            ),
        )
    )
);

?>
@endsection