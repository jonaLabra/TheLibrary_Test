@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje') }}
    </div>
    @endif

    <form method="GET" action="{{ url('/user') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Author</th>
                <th>Category</th>
                <th>Published Day</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $books)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$books->Name}}</td>
                <td>{{$books->Author}}</td>
                <td>{{$books->Category}}</td>
                <td>{{$books->Pub_Day}}</td>
                <td @if ($books->Status == 'Available')
                    style="color:green;"
                @else
                    style="color:red;"
                @endif>{{$books->Status}}</td>
                <td>
                    <a
                    @if ($books->Status != 'Available')
                    style="pointer-events: none;
                    cursor: default;"
                    @else
                    style="pointer-events: auto;
                    cursor: default;"
                      @endif
                     class="btn btn-info" href="{{url('/user/'.$books->id)}}" onclick="return confirm('¿Desea elegir este libro?');">Elegir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $book->links() }}
</div>
@endsection
