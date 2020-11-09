@extends('canvas')

@section('title', 'Ajouter un produit')
@section('description', 'Ajouter un produit')
@section('content')

<div>

    <form class="form-update" action="/addProduct/" method="post">
        @csrf
        <ul>

            <li> 
                <label id="cat">Catégorie : </label> 
                <input type="text" name="cat">
                <span>Créer la catégorie</span>
            </li>
            
            <li>
                <label id="name">Nom : </label>
                <input type="text" name="name">
                <span>Créer le nom</span>
            </li>
            
            <li>
                <label id="price">Prix : </label>
                <input type="text" name="price">
                <span>Créer le prix</span>
            </li>
        
            <li>
                <label id="description">Description : </label>
                <textarea name="description"></textarea>
                <span>Créer la description</span>
            </li>

            <li>
                <label id="qstock">Quantité : </label>
                <textarea name="qstock"></textarea>
                <span>Ajouter un stock</span>
            </li>
            
            <li>
                <input type="submit" name="Ajouter"> Ajouter
            </li>
        </ul>
    </form>

</div>
@endsection