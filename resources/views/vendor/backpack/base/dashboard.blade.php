@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen im Supportinterface von Infinity V!',
    ];
@endphp

@section('content')
@endsection
