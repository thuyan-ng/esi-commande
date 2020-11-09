<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCtrl extends Controller
{
    public function showAll()
    {
        if (Session()->get('currentOrder') == null) {
            $currentOrder = array();
            session(['currentOrder' => $currentOrder]);
        }

        return \App\Product::all();
    }

    public function showProduct($productId)
    {
        if (session()->get('key') == 1) {
            $product = \App\Product::find($productId);
            
            return view("updateProduct", ["product" => $product]);
        }
        return view("error", ["errmsg" => "Accès refusé"]);
    }

    public function update(Request $req, $productId)
    {
        $product = \App\Product::find($productId);

        $newCat = $req->cat;
        if ($newCat != null) {
            $product->update(["cat" => $newCat]);
        }
        
        $newDescription =  $req->description;
        if ($newDescription != null) {
            $product->update(["description" => $newDescription]);
        }

        $newName =  $req->name;
        if ($newName != null) {
            $product->update(["name" => $newName]);
        }

        $newPrice =  $req->price;
        if ($newPrice != null) {
            $product->update(["price" => $newPrice]);
        }

        return redirect("/produits");
    }

    public function delete($productId)
    {
        if (\App\Product::find($productId)->delete()) {
            $data=[
                'status'=>'1',
                'msg'=>'success'
            ];
        } else {
            $data=[
                'status'=>'0',
                'msg'=>'fail'
            ];
        }
        return response()->json($data);
    }

    public function insert(Request $req)
    {
        $product = new \App\Product();
        $product->cat = $req->name;
        $product->name = $req->name;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->qstock = $req->qstock;

        $product->save();

        return redirect("/produits");
    }


    public function apiShowAllProductsInCategorie($categorieId){
        return \App\Product::where("id_cat", $categorieId)->get();
    }

    public function showAllProductsInCategorie($categorieId){
        $nameCat = \App\Categorie::where("id", $categorieId)->first()->name;
        return view("showProductsInCategorie", ["categorieId" => $categorieId, "nameCat" => $nameCat]);
    }
}
