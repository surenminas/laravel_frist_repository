@extends('admin.layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3>Ttile</h3>
                {{ $post->title }}
                <h3>Content</h3>
                {{ $post->content }}
            </div>

            <div>
                <a class="btn btn-primary mb-2" href="{{ route('admin.post.edit', $post->id) }}" role="button">Edit</a>
                <form action="{{ route('admin.post.delete', $post->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>

            <div>
                <a class="btn btn-secondary mt-5" href="{{ route('admin.post.index') }}" role="button">Back</a>
            </div>
        </div>
    </div>
@endsection
