@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
    ];

    $user_count = DB::table('users')->count();
    $user_count_card_widget_definition = [
        'type'       => 'card',
        'content'    => [
            'header' => 'Anzahl von Userdatensätze in der DB',
            'body'   => $user_count,
        ]
    ];

    Widget::add($user_count_card_widget_definition)->to('after_content');

@endphp

@section('content')
@endsection
