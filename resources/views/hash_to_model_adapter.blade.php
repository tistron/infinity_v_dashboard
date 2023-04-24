@extends(backpack_view('blank'))

@php
    $html = '<button type="button" class="btn btn-primary">Click me!</button>';

    $user_count_card_widget_definition = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [ 'type' => 'card', 'content' => ['header' => 'Anzahl User', 'body' => $html ] ],
        ]
    ];
    Widget::add($user_count_card_widget_definition)->to('after_content');
@endphp

<style>
</style>

@section('content')
@endsection
