$(document).ready(function(){
    
    //Get Cart array
    
    var id, name, price, cart, item;
    
    cart = new Array();
    
    $(".add-to-cart").click(function(){
        id = $(this).data("id");
        name = $(this).data("name");
        price = $(this).data("price");
    
        
        if(cart.length === 0){
            cart.push(id);
        } else {
            cart.splice(0,0,id);
        }
        
        console.log(cart);
    
        //Set localStorage
        
        localStorage.setItem("id", cart);
        
        //Disable Add to Cart Button when clicked once
        
        $(this).addClass('disabled');
    });
    
    console.log(localStorage);
    
});