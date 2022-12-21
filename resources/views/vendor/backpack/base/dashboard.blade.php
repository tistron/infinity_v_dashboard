@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface um die Arbeit für Supporter an der DB zu erleichtern!',
    ];
@endphp

@section('content')
@endsection
