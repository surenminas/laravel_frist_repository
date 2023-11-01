@extends('admin.layouts.admin')
@section('content')
    <!-- Info boxes -->
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('admin.gallery.index') }}"><button type="button"
                        class="btn btn-block btn-primary">Back</button> </a>
            </div>
            <div class="col-12 mt-3">
                <form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3 w-25">
                        <label for="" class="form-label">Title</label>
                        <input type="text"  name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group w-25">
                        <label>Select Album</label>
                        <select class="custom-select" name="album">
                            @foreach ($albums as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == old('album') ? 'selected' : '' }}>{{ $item->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group w-25">
                        <label for="">Choose images</label>
                        <div class="custom-file">
                            <input type="file" value="{{ old('image') }}" class="custom-file-input"
                                name="image">
                            <label class="custom-file-label"></label>
                        </div>
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
