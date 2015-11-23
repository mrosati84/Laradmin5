@extends('laradmin::layout/base')

@section('content')
    <h1>Edit {{ $model }}</h1>

    <form method="post" action="{{ $form_action }}">
        @foreach($fields as $field_name => $field_properties)
            {!! $field_properties->getInput()->render($row, $field_name, $field_properties->getLabel()) !!}
        @endforeach

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{-- Tells the framework to consider this as a PUT request --}}
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>
@endsection
