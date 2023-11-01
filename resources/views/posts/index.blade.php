@extends('layouts/main')
@section('content')
    @foreach ($posts as $post)
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">Show</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
