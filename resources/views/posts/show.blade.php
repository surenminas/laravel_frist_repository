@extends('layouts/main')
@section('content')
    <div>
        <h3>Ttile</h3>
        {{ $post->title }}
        <h3>Content</h3>
        {{ $post->content }}
    </div>

       <div>
        <a href="{{ route('post.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
@endsection
