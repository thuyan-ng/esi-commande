<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = ['cat', 'name', 'description', 'price'];
    public $timestamps = false;
    
    
    public static function getAllProducts(){
        return self::all();
    }

    public static function getCat($productId){
        return \App\Categorie::where("id", $productId);
    }
}
