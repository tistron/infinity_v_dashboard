@extends(backpack_view('blank'))

@php
    $users = DB::table('users')->count();

    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
    ];

    $user_count_card_widget_definition = [
        'type'       => 'card',
        // 'wrapper' => ['class' => 'col-sm-6 col-md-4'], // optional
        // 'class'   => 'card bg-dark text-white', // optional
        'content'    => [
            'header' => 'Some card title', // optional
            'body'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>, ornare quis aliquet ut, volutpat et lectus. Aliquam a egestas elit. <i>Nulla posuere</i>, sem et porttitor mollis, massa nibh sagittis nibh, id porttitor nibh turpis sed arcu.',
        ]
    ];
            
    Widget::add($user_count_card_widget_definition)->to('before_content');

@endphp

@section('content')
@endsection
