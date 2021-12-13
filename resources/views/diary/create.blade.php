@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>Write a diary</h1>
    <form action="{{ route('diary.store') }}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-2">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content"></textarea>
            </div>
        </div>
            <div class="form-group">
                <label for="image">Image for this diary</label>
                <input type="file" class="form-control" name="image">
            </div>
        <div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
</div>
@endsection
