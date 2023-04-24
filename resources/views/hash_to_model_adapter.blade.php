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

    async function intToJenkinsHash(num) {
        var str = '';
        var hex = num.toString(16);
        for (var i = 0; i < hex.length; i += 2) {
            var byte = parseInt(hex.substr(i, 2), 16);
            if (byte === 0) {
                break;
            }
            str += String.fromCharCode(byte);
        }

        var hash = 0;
        for (var i = 0; i < str.length; i++) {
            hash += str.charCodeAt(i);
            hash += (hash << 10);
            hash ^= (hash >> 6);
        }
        hash += (hash << 3);
        hash ^= (hash >> 11);
        hash += (hash << 15);

        return hash.toString(36);
    }
</script>

<style>
</style>

@section('content')
@endsection
