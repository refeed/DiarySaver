@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Edit user {{ $user->email }}</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row mb-2">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" name="name" value="{{ $user->name }}">
                </div>
            </div>
            <div class=" form-group row mb-2">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="level" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <input class="form-control" name="level" value="{{ $user->level }}">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
