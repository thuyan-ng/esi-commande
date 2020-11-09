<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
    crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
    crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <header>
        <nav>
            <ul id="nav">

                <li><a class="link" href="/"> Accueil </a></li>
                <li><a class="link" href="/produits"> Produits </a></li>
                <li><a class="link" href="/categories"> Categories </a></li>
                <li><a class="link" href="/groups"> Groupes </a></li>
                <li> <a class="link" href="/order"><i class="far fa-shopping-cart"></i> </a></li>                
                @if(!Session::has('key'))
                <li><a class="link" href="/connexion">Connexion</a></li>
                 @else
                <div class="dropdown">
                    <button class="dropbtn">{{Session::get('studentName')}}
                        <i class="fa fa-caret-down"></i>
                    </button>

                    <div class="dropdown-content">
                        <a class="link" href="/deconnexion">Deconnexion</a>
                    </div>
                </div>
                @endif

            </ul>
        </nav>
    </header>


    <main>

        <h1> @yield('description')</h1>

        @yield('content')

        
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </main>

</body>
</html>
