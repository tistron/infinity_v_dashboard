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
    $tiktok_users = DB::connection('mysql_fivem')->table('tiktok_users')->count();
    $tiktok_videos = DB::connection('mysql_fivem')->table('tiktok_videos')->count();
    $tinder_accounts = DB::connection('mysql_fivem')->table('tinder_accounts')->count();
    $tinder_likes = DB::connection('mysql_fivem')->table('tinder_likes')->count();
    $tinder_messages = DB::connection('mysql_fivem')->table('tinder_messages')->count();
    $twitter_account = DB::connection('mysql_fivem')->table('twitter_account')->count();
    $twitter_hashtags = DB::connection('mysql_fivem')->table('twitter_hashtags')->count();
    $twitter_tweets = DB::connection('mysql_fivem')->table('twitter_tweets')->count();
    $vehicle_parking = DB::connection('mysql_fivem')->table('vehicle_parking')->count();
    $whatsapp_accounts = DB::connection('mysql_fivem')->table('whatsapp_accounts')->count();
    $whatsapp_chats = DB::connection('mysql_fivem')->table('whatsapp_chats')->count();
    $whatsapp_chats_messages = DB::connection('mysql_fivem')->table('whatsapp_chats_messages')->count();
    $whatsapp_groups = DB::connection('mysql_fivem')->table('whatsapp_groups')->count();
    $whatsapp_groups_messages = DB::connection('mysql_fivem')->table('whatsapp_groups_messages')->count();
    $whatsapp_groups_users = DB::connection('mysql_fivem')->table('whatsapp_groups_users')->count();
    $whatsapp_stories = DB::connection('mysql_fivem')->table('whatsapp_stories')->count();


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
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl TikTok User', 'body' => $tiktok_users] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl TikTok Videos', 'body' => $tiktok_videos] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Tinder Accounts', 'body' => $tinder_accounts] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Tinder Likes', 'body' => $tinder_likes] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Tinder Nachrichten', 'body' => $tinder_messages] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Twitter Accounts', 'body' => $twitter_account] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Twitter Hashtags', 'body' => $twitter_hashtags] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl Twitter Tweets', 'body' => $twitter_tweets] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl susgeparkter Autos (Ungenau)', 'body' => $vehicle_parking] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Accounts', 'body' => $whatsapp_accounts] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Chats', 'body' => $whatsapp_chats] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Nachrichten', 'body' => $whatsapp_chats_messages] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Gruppen', 'body' => $whatsapp_groups] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Gruppen Nachrichten', 'body' => $whatsapp_groups_messages] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Gruppen Mitglieder', 'body' => $whatsapp_groups_users] ],
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl WhatsApp Storys', 'body' => $whatsapp_stories] ],
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
