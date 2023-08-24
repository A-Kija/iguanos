@extends('app')

@section('title', 'Sum')

@section('content')
    
    <form action="{{route('sum-submit')}}" method="post" style="border: 1px solid black; padding: 10px; margin: 10px; width: 200px;">
        <h2>Sum</h2>
        <input type="text" name="x" style="width: 30px;" value="{{old('x')}}">
        <b>+</b>
        <input type="text" name="y" style="width: 30px;" value="{{old('y')}}">
        <b>= {{$sum}}</b>
        <div style="margin-top: 20px;">
        <button type="submit">Sum it</button>
        <a href="{{route('sum-form')}}">Reset</a>
        </div>
        @csrf
    </form>

@endsection