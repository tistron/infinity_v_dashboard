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
        jenkinsOneAtATimeHashToString(hashCode).then(function(result) {
            document.getElementById('result').innerHTML = result;
        });
    }

    function jenkinsOneAtATimeHashToString(hash) {
        var str = '';
        for (var i = 0; i < hash.length; i += 2) {
            var byte = parseInt(hash.substr(i, 2), 16);
            if (byte === 0) {
                break;
            }
            str += String.fromCharCode(byte);
        }
        return str;
    }
</script>

<style>
</style>

@section('content')
@endsection
