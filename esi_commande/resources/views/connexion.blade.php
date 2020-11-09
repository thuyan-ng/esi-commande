@extends('canvas')

@section('title', 'Connexion')

@section('content')

<div>
    <h1>Connexion</h1>

    <form class="form-update" action="/connexion/login" method="post">
        @csrf
        <ul>
            <li>
                <label id="login">Login : </label></br>
                <input type="text" name="login" required></br>
                <span>Entrez votre login ici</span>
            </li>
            <li>
                <label id="password">Mot de passe: </label></br>
                <input type="password" name="password" id="password" required></br>
                <span>Entrez votre Mot de passe ici</span>
            </li>
            <li>
                <input type="submit" name="Se Connecter">
            </li>
        </ul>
    </form>

    <h1><a href="/addStudent">Créer un nouveau compte</a></h1>

</div>
@endsection