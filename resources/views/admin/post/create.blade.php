@extends('admin.layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.post.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title"
                        placeholder="Title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea type="text" name="content" class="form-control" id="content" placeholder="Content"> {{ old('content') }}</textarea>
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div>
                    <select class="form-select" name="category" id="category_id"aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->title }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" value="{{ old('image') }}" name="image" class="form-control" id="image"
                        placeholder="Image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" name="tags[]" multiple aria-label="multiple select example">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </div>
@endsection
