@extends(backpack_view('blank'))

@php
    {{ Form::input('text', 'name'); }}
    {{ Form::input('email', 'email_address', null, ['class' => 'emailfld']); }}
@endphp

<style>
</style>

@section('content')
@endsection
