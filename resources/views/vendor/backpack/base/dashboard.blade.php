@extends(backpack_view('blank'))

@php
    use App\Http\Controllers\Admin\UsersCrudController;

    $user_crud_controller = new UsersCrudController();
    $user_count = $user_crud_controller->get_count();

    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => 'Willkommen!',
        'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
    ];


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
