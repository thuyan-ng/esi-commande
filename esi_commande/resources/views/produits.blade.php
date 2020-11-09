@extends('canvas')

@section('title', 'Produits')
@section('description', 'Tous les produits')

@section('content')
<div>
    <div id="product" class="product">
    </div>
</div>

<script>
    $(document).ready(function() {
        $.get({
            url: "/api/produits",
            dataType: "json"
        }).then((res) => {
            if (!$.trim(res)) {
                $("<p>").text("Aucun produit pour le moment").appendTo($("#product"));
            } else {
                console.log(res);
                for (let product of res) {
                    displayProduct(product);
                }
                if ("{{Session::get('key')}}" == 1) {
                    $("<div>").text("Ajouter").addClass("product-button").click(() => location.replace("/addProduct/")).appendTo($("#product"));
                }
            }
        }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));
    

    function displayProduct(product) {
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
        ).append($("<div>").attr("id", "addToCartBtn" + product.id).text("Ajouter au panier").addClass("product-button").click(() => orderProduct(product.id)))
        ).appendTo($("#product"));

        if ("{{Session::get('key')}}" == 1) {
           
            $("#addToCartBtn" + product.id).text("Modifier").click(() => location.replace("/updateProduct/" + product.id))
                
            $("#product-price-div" + product.id).append(
                $("<div>").attr("id", "deleteBtn" + product.id).text("Supprimer").addClass("delete-button").click(() => deleteProduct(product.id))
            );
        }  
    }
        
    

    function orderProduct(productId){
        $.post("/addOrder", {
              idProduct: productId              
        }, (res) => {
            //
        }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));
    }   
    
    function deleteProduct(productId, button){
         $.ajax({
            url : '/deleteProduct/' + productId,
            type : "DELETE"
        }).then((res) => {
            $("#" + productId).fadeOut();
        }).fail((res) => alert("Un problème est survenu. Veuillez réessayer plus tard."));
    }
    });
</script>

@endsection