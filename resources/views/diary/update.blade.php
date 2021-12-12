@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>Update {{ $diary->created_at->format('D d-M-Y / h:i:s A') }}</h1>
    <form action="{{ route('diary.update', $diary->id) }}" method="POST" class="mt-4">
        @method('patch')
        @csrf
        <div class="form-group row mb-2">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content">{{ $diary->content }}</textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
</div>
@endsection
