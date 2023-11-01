<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link href="{{ asset('galleries/gallery.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('lightgallery/lightgallery.css') }}" rel="stylesheet"  >
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link href="{{ asset('lightgallery/customlightgallery.css') }}" rel="stylesheet">






    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])


    <title>First Laravel Project</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main.index') }}">First Laravel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Main</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                    </li> --}}
                    @can('view', auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                        </li>
                    @endcan

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                    </li> --}}


                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <!-- jquery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('galleries/gallery.js') }}"></script> --}}
    <script src="{{ asset('lightgallery/lightgallery.min.js') }}"  ></script>
    <script src="{{ asset('lightgallery/customlightgallery.js') }}"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js" integrity="sha512-b4rL1m5b76KrUhDkj2Vf14Y0l1NtbiNXwV+SzOzLGv6Tz1roJHa70yr8RmTUswrauu2Wgb/xBJPR8v80pQYKtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}





</body>

</html>
