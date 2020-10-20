@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Prestamos</div>
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
                                        <th>#</th><th>idBook</th><th>Name Book</th><th>Date Borrowed</th><th>User Name</th><th>User id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($boorrow ?? '' as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id_Book }}</td>
                                        <td>{{ $item->Name_Book }}</td>
                                        <td>{{ $item->Date_Borrowed }}</td>
                                        <td>{{ $item->User_Name }}</td>
                                        <td>{{ $item->User_id }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $boorrow -> links() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
