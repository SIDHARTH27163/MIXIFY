@extends('posts::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('posts.name') !!}</p>
@endsection
