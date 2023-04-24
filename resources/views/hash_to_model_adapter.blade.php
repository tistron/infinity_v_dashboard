@extends(backpack_view('blank'))

@php
    echo 'Hashwert';
    echo Form::open(array('url'=>'/support/hash_to_model_adapter'));
    echo Form::text('hash');
    echo Form::close();
@endphp

<style>
</style>

@section('content')
@endsection
