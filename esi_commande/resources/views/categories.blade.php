@extends('canvas')

@section('title', 'Toutes les catégories')
@section('description', 'Liste de toutes les catégories')

@section('content')
    <div id="categories">
    
    </div>

    <script>
        $.get({
            url: "/api/categories",
            dataType: "json"
        }).then((res) => {
            for (let categorie of res) {
                    displayCategorie(categorie);
                }

        });

        function displayCategorie(categorie){
            $("<div>").attr("id", "categorie" + categorie.id).addClass("categories").append(
                $("<div>").attr("name", categorie.name).text("Nom : " + categorie.name).append(
                    $("<div>").text("Description : " + categorie.description)
                ).click(() => location.replace("/showProductsInCategorie/"+categorie.id))
            ).appendTo("#categories");
        }


    </script>
@endsection