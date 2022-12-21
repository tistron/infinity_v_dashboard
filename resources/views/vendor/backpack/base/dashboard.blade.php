@extends(backpack_view('blank'))

@php
    use App\Http\Controllers\Admin\UsersCrudController;

    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
    ];

    $user_count = DB::connection('foo')->select('SELECT COUNT(*) FROM users');
    $user_count_card_widget_definition = [
        'type'       => 'card',
        'content'    => [
            'header' => 'Anzahl der Userdatensätze in der DB',
            'body'   => $user_count,
        ]
    ];

    Widget::add($user_count_card_widget_definition)->to('after_content');

@endphp

@section('content')
@endsection
