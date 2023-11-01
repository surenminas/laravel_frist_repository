@extends('admin.layouts.admin')
@section('content')
    <div class="container">
        <div class=" mb-3">
            <a href="{{ route('admin.post.create') }}" role="button" class="btn btn-primary">Add one</a>
        </div>
        <div class="row">

            @foreach ($posts as $post)
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
