@layout('layout.auth')


@section('content')
    <h2>{{ __('auth.disabled.title') }}</h2>
    <p>{{ __('auth.disabled.message') }}</p>
    <p>{{ HTML::link(URL::to_action('auth'), __('auth.disabled.goback')) }}</p>
@endsection