@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Diary Lists</h1>
        <h4>Total: {{ $diaries->count() }}</h4>
        <a href="{{ route('diary.create') }}" class="btn btn-primary">Write a diary</a>

        @if(Session::has('msg'))
            <div class="alert alert-success">{{Session::get('msg')}}</div>
        @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diaries as $diary)
                <tr>
                    <td><a href="{{ route('diary.show', $diary->id) }}">{{ $diary->created_at->format('D d-M-Y / h:i:s A') }}</a></td>
                    <td>
                        <a href="{{ route('diary.edit', $diary->id) }}" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form action="{{ route('diary.destroy', $diary->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $diaries->links() }}
    </div>
</div>
@endsection
