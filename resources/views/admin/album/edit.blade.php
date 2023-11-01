@extends('admin.layouts.admin')
@section('content')
    <!-- Info boxes -->
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('admin.album.index') }}"><button type="button"
                        class="btn btn-block btn-primary">Back</button> </a>
            </div>
            <div class="col-12 mt-3">
                <form action="{{ route('admin.album.update', $album->id) }}" method="post" >
                    @csrf
                    @method('patch')
                    
                    <div class="form-group mb-3 w-25">
                        <label for="" class="form-label">Title</label>
                        <input type="text" value="{{ $album->title }}" name="title" class="form-control"
                            placeholder="Title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
