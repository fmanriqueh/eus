var Cart = function(){

    const CART = "CART";

    let _setCart = function(products = {}){
        window.localStorage.setItem(CART, JSON.stringify(products));
    }

    let _getCart = function(){
        return JSON.parse(window.localStorage.getItem("CART"));
    }

    let _destroyCart = function(){
        window.localStorage.removeItem(CART);
    }

    let _addCart = function(product){
        let cart = _getCart();
        cart[product.id] = product;
        _setCart(cart);
    }

    let _removeCart = function(id){
        let cart = _getCart();
        delete cart[id];
        _setCart(cart);
    }

    return {
        init: function(){
            if(_getCart() == null){
                _setCart();
            }else{
                console.log(_getCart())
            }
        },
        add: _addCart,
        remove: _removeCart,
        get: _getCart,
        destroy: _destroyCart
    }
}();

$(document).ready(function(){
    Cart.init();
});