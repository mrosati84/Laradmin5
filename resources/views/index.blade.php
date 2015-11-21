@extends('laradmin::layout/base')

@section('content')
    <h1>List entries for {{ $model }}</h1>

    <table class="table">
        <thead>
            <tr>
                @foreach($fields as $field_name => $field_props)
                    <th>{{ $field_name }}</th>
                @endforeach
                    <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($fields as $field_name => $field_properties)
                    <td>
                        {!! $field_properties['widget']->render($row, $field_name) !!}
                    </td>
                @endforeach

                {{-- Render the actions for every row of this model --}}
                <td>
                    <div class="btn-group">
                        @foreach($actions as $action)
                            {!! $action->render($row) !!}
                        @endforeach
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
