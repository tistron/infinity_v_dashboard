@extends(backpack_view('blank'))

@php

    use App\Http\Controllers\Admin\UsersCrudController;

    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'In der Leiste links kannst du auf die Verschiedenen Tabellen zugreifen und diese bei Bedarf anpassen. Viel Spaß!',
    ];

    $user_count = DB::connection('mysql_fivem')->table('users')->count();
    $vehicle_count = DB::connection('mysql_fivem')->table('owned_vehicles')->count();
    $instagram_posts = DB::connection('mysql_fivem')->table('instagram_posts')->count();
    $billing_count = DB::connection('mysql_fivem')->table('okokbilling')->count();
    $phone_messages = DB::connection('mysql_fivem')->table('phone_messages')->count();

    $user_count_card_widget_definition = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl User', 'body' => $user_count ] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Fahrzeuge', 'body' => $vehicle_count] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Instagram Storys', 'body' => $instagram_posts] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Rechnungen', 'body' => $billing_count] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Smartphone Nachrichten', 'body' => $phone_messages] ],
        ]
    ];
    Widget::add($user_count_card_widget_definition)->to('after_content');

@endphp

<style>
    .card-header {
        background: #eceff3 !important;
    }
</style>

@section('content')
@endsection
