@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
    ];
@endphp

@section('content')
    <p>Your custom HTML can live here</p>
@endsection
