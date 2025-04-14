@extends('jsonform.admin.layout')

@section('content')
    <h2>Available Forms</h2>
    <ul class="list-group">
        @foreach($forms as $form)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $form['name'] }}
                <a href="{{ url('admin/forms/'.$form['key']) }}" class="btn btn-sm btn-outline-primary">View Submissions</a>
            </li>
        @endforeach
    </ul>
@endsection
