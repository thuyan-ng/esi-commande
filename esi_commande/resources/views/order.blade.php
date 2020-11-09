@extends('canvas')

@section('title', 'Panier')
@section('description', 'Contenu du panier')

@section('content')
<div>
    <div id="product" class="product">
    </div>
</div>
<div id="askLogin">
    <label for="login">Quel est votre login? </label>
    <input type="text" name="login" id="login" required>
    <button onClick=isValid()>Confirmer</button>
    </br>
    <span id="notValid"></span>
</div>
<script>
    $("#askLogin").hide();

    $.get({
        url: "/api/order",
        dataType: "json"

    }).then((res) => {
        if (!$.trim(res)) {
            $("<p>").text("Aucun article dans le panier pour le moment").appendTo($("#product"));
        } else {
            res.forEach(product => {
                displayCart(product);
            });
            $("<button>").attr('id', 'buy-button').text("Acheter le contenu du panier").addClass("product-button").click(() => buyProducts()).appendTo($("#product"));
        }

    }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));

    function displayCart(product) {
        $("<div>").attr("id", product.id).addClass("product-id").append(
            $("<div>").addClass("product-img").prepend($('<img>',{id:'theImg',src:'/img/' + product.id + '.jpg'}))
        ).append($("<div>").addClass("product-cat-name-description").append(
            $("<div>").text("Catégorie : " + product.cat).addClass("product-cat")
        ).append(
            $("<div>").text("Référence : " + product.name).addClass("product-name")
        ).append(
            $("<div>").text(product.description).addClass("product-description"))).append($("<div>").addClass("product-price-button").append(
            $("<div>").text(product.price + " €").addClass("product-price")
        ).append($("<button>").text("Supprimer du panier").addClass("product-button").click(() => deleteProduct(product.id)))).appendTo($("#product"));
    }

    function deleteProduct(productId) {
        $.ajax({
            url: '/api/order/' + productId,
            type: "DELETE"
        }).then((res) => {
            $("#" + productId).fadeOut();
        }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));
    }

    function buyProducts() {
        if ("{{Session::has('key')}}" == false) {
            $("#askLogin").show();
        } else {
            confirmBuyProducts("{{Session::get('key')}}");
        }
    }

    function isValid() {
        $.get({
            url: "api/students/" + parseInt($("#login").val()),
            dataType: "json"

        }).then((res) => {
            if (res) {
                confirmBuyProducts(parseInt($("#login").val()));
            } else {
                $("#notValid").text("Ce login n'existe pas. Veuillez vous inscrire.");
            }
        }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));
    }

    function confirmBuyProducts(login) {
        $.post("/api/order/create", {
              idStudent: login              
        }, (res) => {
            console.log(res)
            $("#product").empty();
            $("#product").append($("<p>").text("Votre commande a été effectuée!"));
        }).fail((res) => console.log(res));
    }
</script>
@endsection