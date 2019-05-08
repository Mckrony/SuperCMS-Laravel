@extends('layouts.blog-profile')
@section('content')

@foreach($user as $u)
    name : {{ $u->name }}
    @endforeach




@stop