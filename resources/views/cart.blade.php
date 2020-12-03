@extends('layouts.master')

@section('title', 'Carrito - EUS')

@section('content')
    <div class="entrepreneurs-container">
        <div class="row" id="grid">

        </div>
        <br>
        <div class="col-md-6 offset-md-4">
            <p id="total"></p>
            <button onclick="sendRequest()" class="btn btn-primary">
                {{ __('Enviar pedido') }}
            </button>
        </div>
    </div>

    <script>

        jQuery(function(){
            local_cart = Cart;
            showElements();
        });

        var local_cart;

        function showElements(){
            let cart = local_cart.get();
            let grid = document.getElementById("grid");
            grid.innerHTML = '';
            let total = 0;


            for(let product in cart){
                // console.log(cart[product])
                total += cart[product].price;
                let new_element = document.createElement("div");
                new_element.id = cart[product].id;
                new_element.classList.add("col-6");
                new_element.classList.add("col-sm-4");
                new_element.classList.add("col-md-3");
                new_element.classList.add("text-center");
                let grid_element = document.createElement("div");
                grid_element.classList.add("grid-element");
                let new_a_element = document.createElement("div");
                let picture = document.createElement("div");
                picture.classList.add("profile-picture");
                let image = document.createElement("img");
                image.src = "storage/"+cart[product].photo_url;
                image.style.width = "100%";
                let description = document.createElement("div");
                description.innerHTML += cart[product].description;
                description.innerHTML += "<button style='background-color:none; border: none'onclick='removeElement("+cart[product].id+")'><svg class='icon icon-close' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z'/></svg></button>";
                picture.appendChild(image);
                new_a_element.appendChild(picture)
                new_a_element.appendChild(description)
                grid_element.appendChild(new_a_element);
                new_element.appendChild(grid_element);
                grid.appendChild(new_element);
            }
            let p = document.getElementById("total");
            p.innerHTML = "Total: ";
            p.innerHTML += formatNumber(total)+"$";

        }

        function removeElement(id){
            Cart.remove(id);
            showElements();
        }

        function formatNumber (n) {
            n = String(n).replace(/\D/g, "");
          return n === '' ? n : Number(n).toLocaleString();
        }

        function sendRequest(){
            axios.post('/send', local_cart.get())
            .then( data => console.log(data));
        }
    </script>

@endsection
