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

    $user_count_card_widget_definition = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl User', 'body' => $user_count ] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Fahrzeuge', 'body' => $vehicle_count] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Instagram Storys', 'body' => $instagram_posts] ],
        ]
    ];
    Widget::add($user_count_card_widget_definition)->to('after_content');

@endphp

<style>
    .card-body {
        background-color: #eceff3;
    }
</style>

@section('content')
@endsection
