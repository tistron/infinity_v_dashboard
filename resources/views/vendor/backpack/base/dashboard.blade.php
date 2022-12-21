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
    $player_contacts = DB::connection('mysql_fivem')->table('player_contacts')->count();
    $player_houses = DB::connection('mysql_fivem')->table('player_houses')->count();
    $player_notes = DB::connection('mysql_fivem')->table('player_notes')->count();
    $saved_documents = DB::connection('mysql_fivem')->table('saved_documents')->count();


    $user_count_card_widget_definition = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl User', 'body' => $user_count ] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Fahrzeuge', 'body' => $vehicle_count] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Instagram Storys', 'body' => $instagram_posts] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Rechnungen', 'body' => $billing_count] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Smartphone Nachrichten', 'body' => $phone_messages] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Smartphone Kontakte', 'body' => $player_contacts] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Häuser', 'body' => $player_houses] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Notizen', 'body' => $player_notes] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl gespeicherte Dokumente', 'body' => $saved_documents] ],
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
