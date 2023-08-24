@extends('app')

@section('title', 'HELLO Page Title')

@section('content')
    @if(2 == $font)
    <h1 style="color:{{$color}}; font-family:monospace;">hello blade</h1>
    @else
    <h1 style="color:{{$color}};">hello blade</h1>
    @endif
    <ul>
    @foreach($people as $person)
    <li>{{$person['name']}} <i>{{$person['age']}}</i></li>
    @endforeach
    </ul>
@endsection