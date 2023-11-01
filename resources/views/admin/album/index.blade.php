@extends('admin.layouts.admin')
@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- Info boxes -->
            <div class="row mb-2 mt-5 ">

                    <div class="col-2">
                        <a href="{{ route('admin.album.create') }}"><button type="button"
                                class="w-15 btn btn-block btn-primary">Create Rate</button> </a>
                    </div>

            </div>
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <div class="card">

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th colspan="3">Settings</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($albums as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td><a class="text-success" href="{{ route('admin.album.edit', $item->id) }}"><i
                                                        class="far fa-edit"></i></a>
                                            </td>
                                            {{-- @can('delete', auth()->user()) --}}
                                            <td>
                                                <form action="{{ route('admin.album.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-transparent border-0"><i
                                                            class="fas fa-trash text-danger"></i></button>
                                                </form>
                                            </td>
                                            {{-- @endcan --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="mt-3">
                        {{-- {{ $posts->withQueryString()->links() }} --}}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
@endsection
