@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Books</div>
                    <div class="card-body">
                        <a href="{{ url('/books/create') }}" class="btn btn-outline-success btn-sm" title="Add New Book">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Book
                        </a>
                        <a href="{{ url('/category/create') }}" class="btn btn-outline-dark btn-sm" title="Add New Category">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Category
                        </a>
                        <form method="GET" action="{{ url('/books') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Author</th><th>Category</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($books ?? '' as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Name }}</td><td>{{ $item->Author }}</td><td>{{ $item->Category }}</td><td>{{ $item->Status }}</td>
                                        <td>
                                            <a href="{{ url('/books/' . $item->id) }}" title="View Book"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/books/' . $item->id . '/edit') }}" title="Edit Book"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/books' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $books ?? ''->appends(['search' => Request::get('search')])->render() !!} </div>
                            {{-- Pagination --}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
