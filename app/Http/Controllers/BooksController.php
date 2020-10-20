<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $books = Book::where('Name', 'LIKE', "%$keyword%")
                ->orWhere('Author', 'LIKE', "%$keyword%")
                ->orWhere('Category', 'LIKE', "%$keyword%")
                ->orWhere('Pub_Day', 'LIKE', "%$keyword%")
                ->orWhere('Status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $books = Book::latest()->paginate($perPage);
        }


        return view('books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $datos['category']=Category::paginate(100);
        return view('books.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $campos =  [
            'Name' => 'required|string|max:100',
            'Author' => 'required|string|max:100',
            'Category' => 'required',
            'Pub_Day' => 'required|string|max:1000',
            'Status' => 'required|string|max:1000',
        ];
        $Mensaje = ["required"=>':attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        $requestData = request()->except('_token');

        Book::insert($requestData);

        return redirect('books')->with('flash_message', 'Book added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $datos['category']=Category::paginate(100);
        return view('books.edit', compact('book'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $book = Book::findOrFail($id);
        $book->update($requestData);

        return redirect('books')->with('flash_message', 'Book updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect('books')->with('flash_message', 'Book deleted!');
    }
}
