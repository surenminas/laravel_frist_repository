@extends('layouts/main')
@section('content')
    {{-- <img id="myImg" src="{{ asset('storage/images/' . 'aaa.webp') }}" alt="Snow" style="width:100%;max-width:300px"> --}}

    {{-- <div class="gallery">
        @foreach ($galleries as $item)
            <a href="{{ asset('storage/' . $item->img_puth) }}">
                <img src="{{ asset('storage/' . $item->img_puth) }}" alt="" style="width:100%;max-width:300px">
            </a>
        @endforeach
    </div> --}}

    <div class="gallery_">
        @foreach ($albums as $item)
        <div class="col-lg-3" >
            <a href="{{ route('gallery.show', $item->id) }}">
                <div class="info-box bg-white mb-4">
                    <div class="info-box-content btn btn-light w-100">
                        <span class="info-box-text text-center text-muted ">{{ $item->title }}</span>
                        {{-- <span class="info-box-number text-center text-muted mb-0">({{ $category->posts->count() }})</span> --}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">X</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
@endsection
