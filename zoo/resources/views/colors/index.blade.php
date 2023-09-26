@extends('appb')

@section('content')

<h2>Nice Colors</h2>
@foreach ($colors as $color)
    <div style="font-size: {{ $size }}px; color: {{ $color }};">
        {{ $color }}
    </div>
@endforeach

@endsection