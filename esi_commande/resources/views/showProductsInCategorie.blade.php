@extends('canvas')

@section('title', 'Catégorie')
@section('description', "Liste des produits de la catégorie")

@section('content')
    <h1> {{$nameCat}} </h1>
    <div id="product">
    
    </div>

    <script>
        $.get({
            url: "/api/categories/{{$categorieId}}",
            dataType: "json"
        }).then((res) => {
            console.log(res);
            for (let product of res) {
                console.log(product);
                displayProduct(product);
            }
        }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));;

        function displayProduct(product){
              $("<div>").attr("id", product.id).addClass("product-id").append(
                $("<div>").addClass("product-img").prepend($('<img>',{id: 'img' + product.id, src:'/img/' + product.id + '.jpg'}))
            ).append($("<div>").addClass("product-cat-name-description").append(
                $("<div>").text("Catégorie : " + product.id_cat).addClass("product-cat")
            ).append(
                $("<div>").text("Référence : " + product.name).addClass("product-name")
            ).append(
                $("<div>").text(product.description).addClass("product-description"))
            ).append($("<div>").attr("id", "product-price-div" + product.id).addClass("product-price-button").append(
                $("<div>").text(product.price + " €").addClass("product-price")
            )).appendTo($("#product"));
        }
    </script>
@endsection