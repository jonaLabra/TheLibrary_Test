@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Caegorias</div>
                    <div class="card-body">
                        <a href="{{ url('/books') }}" class="btn btn-outline-warning btn-sm" title="Back">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>Back
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>id</th><th>Name</th><th>Description</th><th>Many Books</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($res ?? '' as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->Name }}</td>
                                        <td>{{ $item->Description }}</td>
                                        <td>{{ $item->cantidad }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
