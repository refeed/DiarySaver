@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Image Lists</h1>
        <h4>Total: {{ $images->count() }}</h4>

        @if(Session::has('msg'))
            <div class="alert alert-success">{{Session::get('msg')}}</div>
        @endif
        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-4">
                    {{-- FIXME: Akan error ketika ada buku yang tidak memiliki galeri --}}
                    <div>
                        <a href="{{ route('diary.show', $image->diary_id) }}" data-lightbox="image-1">
                            <img src="{{ $image->getThumbAssetPath() }}" style="width: 200px; height:150px">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
