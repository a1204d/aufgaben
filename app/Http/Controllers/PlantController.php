<?php



namespace App\Http\Controllers;



use App\Models\Plant;

use Illuminate\Http\Request;



class PlantController extends Controller

{

    public function index()

    {

        return Plant::get();

    }



    public function show(string $slug)

    {

        return Plant::where('slug', '=', $slug)->first();

    }

}
