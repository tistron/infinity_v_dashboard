@extends(backpack_view('blank'))

@php
    $text_html = '<input type="text" id="hash_code" name="hash_code" placeholder="Hash Code">';
    $button_html = '<hr><button type="button" id="calculate-btn" class="btn btn-primary">Model berechnen</button><hr>';
    $erg_html = '<div id="result"></div>';

    $user_count_card_widget_definition = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [ 'type' => 'card', 'content' => ['header' => 'Hash To Model Converter', 'body' => $text_html . $button_html . $erg_html ] ],
        ]
    ];
    Widget::add($user_count_card_widget_definition)->to('after_content');
@endphp

<script>
</script>

<style>
</style>

@section('content')
@endsection
