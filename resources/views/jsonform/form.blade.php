<form method="POST" action="{{ $formJson['action'] }}" class="p-4">
    @csrf
    @foreach($formJson['fields'] as $field)
        <div class="mb-3">
            <label class="form-label">{{ $field['label'] }}</label>
            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" class="form-control" value="{{ old($field['name']) }}">
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
