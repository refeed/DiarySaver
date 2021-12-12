@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>User Lists</h1>
        <h4>Total: {{ $users->count() }}</h4>

        @if(Session::has('msg'))
            <div class="alert alert-success">{{Session::get('msg')}}</div>
        @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Level</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->level}}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
