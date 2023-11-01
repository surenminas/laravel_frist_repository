@extends('admin.layouts.admin')
@section('content')
    <div>
        <a href="{{ route('admin.post.index') }}">Back</a>
    </div>
    <div class="col-lg-6 mt-3">
        <form action="{{ route('admin.post.update', $post->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title"  class="form-control" id="title" placeholder="Title"
                    value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea type="text" name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div>
                <select class="form-select" name="category_id" id="category_id"aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option {{ $category->id === $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->title }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                    value="{{ $post->image }}">
            </div>
            <div>
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" name="tags[]" multiple aria-label="multiple select example" id="tags">
                    @foreach ($tags as $tag)
                        <option
                            @foreach ($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected' : '' }} 
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
