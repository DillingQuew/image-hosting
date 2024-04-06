@extends('main')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @error('files')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <form method="POST" action="/images">

        <div class="mb-3">
            @csrf
            <label for="files" class="form-label">Multiple files input</label>
            <input class="form-control @error('files') is-invalid @enderror" name="files[]" type="file" id="files" multiple >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


@endsection
