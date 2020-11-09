@extends('canvas')
@section('title', 'Créer un compte')
@section('content')

<div>
    <h1>Créer un nouvel étudiant</h1>

    <form class="form-update"  action="/api/addStudent" method="post">
        @csrf
        <ul>
            <li>
                <label id="login">Login : </label></br>
                <input type="text" name="login" required></br>
                <span>Entrer votre login ici</span>
            </li>

            <li>
                <label id="last_name">Nom : </label></br>
                <input type="text" name="last_name" required></br>
                <span>Entrer votre nom ici</span>
            </li>

            <li>
                <label id="first_name">Prénom : </label></br>
                <input type="text" name="first_name" required></br>
                <span>Entrer votre prénom ici</span>
            </li>

            <li>
                <label id="password">Mot de passe: </label></br>
                <input type="password" name="password" id="password" required></br>
                <span>Entrer votre mot de passe ici</span>
            </li>


            <li>
                <label id="groupe">Groupe: </label></br>
                <input type="text" name="groupe" id="groupe" required></br>
                <span>Entrer votre groupe ici</span>
            </li>

            <li>
                <button>Confirmer</button>
            </li>
        </ul>
    </form>

</div>

@endsection