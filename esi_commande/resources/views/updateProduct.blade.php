@extends('canvas')

@section('title', 'Modifier un produit')
@section('description', 'Modifier un produit')
@section('content')

<div>
    <div id="info" class="info">
        <h3> Données actuelle pour le produit {{$product->name}} </h3>
        <p> Catégorie : {{$product->cat}} </p>
        <p> Description : {{$product->description}} </p>
        <p> Prix : {{$product->price}} </p>
        <p> Quantité : {{$product->qstock}} </p>
    </div>


    <form class="form-update" action="/updateProduct/{{$product->id}}" method="post">
        @csrf
        <ul>

            <li> 
                <label id="cat">Catégorie : </label> 
                <input type="text" name="cat">
                <span>Changer la catégorie</span>
            </li>
            
            <li>
                <label id="name">Nom : </label>
                <input type="text" name="name">
                <span>Changer le nom</span>
            </li>
            
            <li>
                <label id="price">Prix : </label>
                <input type="text" name="price">
                <span>Changer le prix</span>
            </li>
        
            <li>
                <label id="description">Description : </label>
                <textarea name="description"></textarea>
                <span>Changer la description</span>
            </li>
            
            <li>
                <input type="submit" name="Modifier">
            </li>
        </ul>
    </form>

</div>
@endsection