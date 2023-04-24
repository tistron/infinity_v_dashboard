@extends(backpack_view('blank'))

@php
    $text_html = '<input type="text" id="hash_code" name="hash_code" placeholder="Hash Code">';
    $button_html = '<button type="button" id="calculate-btn" class="btn btn-primary">Model berechnen</button>';
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
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('calculate-btn').addEventListener('click', calculateModel);
    });

    function calculateModel() {
        var hashCode = document.getElementById('hash_code').value;
        intToJenkinsHash(hashCode).then(function(result) {
            document.getElementById('result').innerHTML = result;
        });
    }

    function intToJenkinsHash(num) {
        return new Promise(function(resolve, reject) {
            var key = num.toString();
            var hash = 0,
                i = key.length;
            while (i--) {
                hash += key.charCodeAt(i);
                hash += (hash << 10);
                hash ^= (hash >> 6);
            }
            hash += (hash << 3);
            hash ^= (hash >> 11);
            hash += (hash << 15);
            var result = hash.toString(16);
            resolve(result);
        });
    }
</script>

<style>
</style>

@section('content')
@endsection
