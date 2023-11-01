@extends('admin.layouts.admin')
@section('content')
    <!-- Info boxes -->
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('admin.rate.index') }}"><button type="button"
                        class="btn btn-block btn-primary">Back</button> </a>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.rate.update', $rate->id) }}" method="post" >
                    @csrf
                    @method('patch')
                    
                    <div class="form-group mb-3 w-25">
                        <label for="" class="form-label">Country Name</label>
                        <input type="text" value="{{ $rate->name }}" name="name" class="form-control"
                            placeholder="Title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group w-25">
                        <input type="text" value="{{ $rate->symbole }}" name="symbole" class="form-control"
                            placeholder="Title">
                        @error('symbole')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
