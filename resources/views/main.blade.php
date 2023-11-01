@extends('layouts/main')

@section('content')
    <div class="col-lg-6 mt-5">
        <div class="lastests_posts_with_photos bg_side">
            <h5>Exchange rates</h5>
            <div class="table_rate pb-3 c">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <div class="text-center">
                                    <span>{{ date("d.m.Y") }}</span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span>Currency</span>
                            </td>
                            <td>
                                <span>AMD</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rates as $key => $value)
                            <tr>
                                <td>{{ $value->symbole }}</td>
                                <td>{{ $value->rate_exchange }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
