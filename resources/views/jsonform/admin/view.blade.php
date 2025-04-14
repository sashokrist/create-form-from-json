@extends('jsonform.admin.layout')

@section('content')
    <h2>{{ $formName }} Submissions</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach($fields as $field)
                <th>{{ $field['label'] }}</th>
            @endforeach
            <th>Submitted At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entries as $entry)
            <tr>
                @foreach($fields as $field)
                    <td>{{ $entry->{$field['name']} }}</td>
                @endforeach
                <td>{{ $entry->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
