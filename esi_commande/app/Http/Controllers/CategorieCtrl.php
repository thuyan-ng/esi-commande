<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieCtrl extends Controller
{
    public function showAll(){
        return \App\Categorie::all();
    }

    public function show($categorieId){
        return \App\Categorie::find($categorieId);
    }
}
