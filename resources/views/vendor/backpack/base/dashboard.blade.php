@extends(backpack_view('blank'))

@php

    use App\Http\Controllers\Admin\UsersCrudController;

    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
    ];


    $user_count = DB::connection('mysql_fivem')->table('users')->count();
    $vehicle_count = DB::connection('mysql_fivem')->table('owned_vehicles')->count();
    $instagram_posts = DB::connection('mysql_fivem')->table('instagram_posts')->count();

    $info_body_text = 'Anzahl User: ' . $user_count;
    $info_body_text .= '\n Anzahl Fahrzeuge: ' . $vehicle_count;

    $user_count_card_widget_definition = [
        'type'       => 'card',
        'class'      => 'card bg-dark text-white',
        'content'    => [
            'header' => 'Interessante Daten zum Server',
            'body'   => $info_body_text,
        ]
    ];
    Widget::add($user_count_card_widget_definition)->to('after_content');

@endphp

@section('content')
@endsection
