@layout('layout.main')


@section('content')
        <div class="row-fluid">
            <div class="span6 well">
            @include('shoplist.form')
            </div>
            <div class="span6">
                <h4>{{ __('pieko.shoplist') }}</h4>
                <hr>
                @include('shoplist.list')
            </div>
        </div>

@endsection