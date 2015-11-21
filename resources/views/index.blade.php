@extends('laradmin::layout/base')

@section('content')
    <h1>List entries for {{ $model }}</h1>
    <table class="table">
        <thead>
            <tr>
                @foreach($fields as $field)
                    <th>{{ $field }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($fields as $field)
                    <td>{{ $row->$field }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection