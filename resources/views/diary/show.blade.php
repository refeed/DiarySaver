@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ $diary->created_at->format('D d-M-Y / h:i:s A') }}</h1>

    <div class="container">
        {{ $diary->content }}
    </div>

    </div>
</div>
@endsection
