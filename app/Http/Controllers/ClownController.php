<?php



namespace App\Http\Controllers;



use App\Models\Clown;

use Illuminate\Http\Request;



class ClownController extends Controller

{

    public function index() {

        return Clown::get();

    }



    public function remove(int $id) {

        $clown = Clown::findOrFail($id);

        $clown->delete();

    }



    public function store(Request $request) {

        dd($request->all());

    }

}
