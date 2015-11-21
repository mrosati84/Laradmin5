@extends('laradmin::layout/base')

@section('content')
    <h1>List entries for {{ $model }}</h1>
    <ul>
        @foreach($rows as $row)
            <li>{{ $row }}</li>
        @endforeach
    </ul>
@endsection