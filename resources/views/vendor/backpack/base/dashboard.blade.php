@extends(backpack_view('blank'))

@php
    use App\Http\Controllers\Admin\UsersCrudController;

    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
    ];


    $user_count = DB::connection('mysql_fivem')->table('users')->count();
    $user_count_card_widget_definition = [
        'type'       => 'card',
        'class'      => 'card bg-dark text-white',
        'content'    => [
            'header' => 'Anzahl der Userdatensätze in der DB',
            'body'   => $user_count,
        ]
    ];

    Widget::add($user_count_card_widget_definition)->to('after_content');

@endphp

@section('content')
@endsection
