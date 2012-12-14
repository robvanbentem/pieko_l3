@layout('layout.main')


@section('content')
    <p>
        {{ __('pieko.welcome', array('name' => Auth::user()->firstname)) }}
    </p>
@endsection