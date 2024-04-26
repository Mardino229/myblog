<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Categorie;
use App\Http\Requests\CreateCategorieRequest;

class CategorieController extends Controller
{
    public function show(){
        $categories = Categorie::all();
        return view('categorie.show',[
            'categories' => $categories
        ]);
    }

    public function new(){
        return view('categorie.new');
    }

    public function save(CreateCategorieRequest $request){
        $categorie = Categorie::create($request->validated());
        return to_route('show')->with('success', 'Le bien a bien été créé');
    }

    public function dell(Categorie $categorie){
        $categorie->delete();
        return to_route('show')->with('success', 'Le bien a bien été supprimé');
    }
}
