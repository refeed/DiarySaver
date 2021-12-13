@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ $diary->created_at->format('D d-M-Y / h:i:s A') }}</h1>

    <div class="container">
        @if ( $diary->getImagePath() )
            <div class="text-center"><img class="img-fluid rounded" src="{{ $diary->getImagePath() }}" alt=""></div>
        @endif
        {{ $diary->content }}
    </div>

    </div>
</div>
@endsection
