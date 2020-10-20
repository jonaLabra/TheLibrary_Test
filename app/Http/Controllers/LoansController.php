<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $book = Book::where('Name', 'LIKE', "%$keyword%")
                ->orWhere('Author', 'LIKE', "%$keyword%")
                ->orWhere('Category', 'LIKE', "%$keyword%")
                ->orWhere('Pub_Day', 'LIKE', "%$keyword%")
                ->orWhere('Status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $book = Book::latest()->paginate($perPage);
        }


        return view('user', compact('book'));
    }
    public function getLoans(){
        $datos['boorrow']=loans::paginate(5);
        return view('books/borrow',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
        $datos=Book::findOrFail($id);

        $id_Book=$datos->id;
        $NameBook=$datos->Name;
        $Date_Borrowed=date('Y-m-d H:i:s');
        $User_Name=Auth::user()->name;
        $User_id=Auth::user()->id;
        $data = array("id_Book" => $id_Book,"Name_Book" => $NameBook,"Date_Borrowed"=> $Date_Borrowed,"User_Name"=> $User_Name,"User_id"=> $User_id);
        loans::insert($data);
        return redirect('user')->with('Mensaje','Operacion Exitosa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datos=Book::findOrFail($id);

        $id_Book=$datos->id;
        $NameBook=$datos->Name;
        $Date_Borrowed=date('Y-m-d H:i:s');
        $User_Name=Auth::user()->name;
        $User_id=Auth::user()->id;
        $data = array("id_Book" => $id_Book,"Name_Book" => $NameBook,"Date_Borrowed"=> $Date_Borrowed,"User_Name"=> $User_Name,"User_id"=> $User_id);
        loans::insert($data);
        Book::where('id','=',$id)->update(['Status' => 'NotAvailable']);
        return redirect('user')->with('Mensaje','Operacion Exitosa!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function edit(loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loans $loans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loans  $loans
     * @return \Illuminate\Http\Response
     */
    public function destroy(loans $loans)
    {
        //
    }
}
