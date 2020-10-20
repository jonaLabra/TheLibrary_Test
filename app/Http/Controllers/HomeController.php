<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getUser()
    {
        $datos['book']=Book::paginate(5);
        return view('user',$datos);
    }

    public function store($id)
    {
        //
        //$datosEmpleado=request()->all();
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



}
