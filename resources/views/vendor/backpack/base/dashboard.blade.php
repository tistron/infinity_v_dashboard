@extends(backpack_view('blank'))

@php
    $users = DB::table('users')->count();

        $widgets['before_content'][] = [
            'type'        => 'jumbotron',
            'heading'     => 'Willkommen!',
            'content'     => 'Hier entsteht ein Interface für Infinity V RP, um die Arbeit für Supporter an der DB zu erleichtern!',
        ];
        $widgets['content'][] = [
            'type'       => 'card',
            'content'    => [
                'header' => 'Anzahl Userdatensätze in der DB',
                'body'   => $users,
            ]
        ];
@endphp

@section('content')
@endsection
