@extends('canvas')

@section('title', 'Accueil')
@section('description', 'Esi - commande')

@section('content')
     @if(Session::has('key'))
        <div class="index-student">
            <p> Bienvenue {{Session::get('studentName')}} </p>
            <p> Sur ce site vous pourrez acheter de articles pour l'école.</br> Si vous voulez regarder ce qu'il y a en stock vous pouvez cliquer sur produits. Pour regarder les articles dans votre panier cliquer sur le caddie.</p>
        </div>
    @endif
@endsection