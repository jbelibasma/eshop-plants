
'use strict';


function ShowPanier() {

    const  carts = loadpanier('panier');

    if (carts ==null) {
        $('#product').html($('<p>').text('panier vide'));
        return ;
    }


    
    carts.forEach(function(cart){

        let tr = $('<tr>');
        tr.append('<td><img class="w-25" src="'+cart.img+'"></td>');
        tr.append('<td>'+cart.name+'</td>');
        tr.append('<td>'+cart.prix+'</td>');
        tr.append('<td>'+cart.quantity+'</td>');
        tr.append('<td>'+cart.quantity * cart.prix +'</td>');

    $('#product').append(tr);
    console.log(tr);
})}
ShowPanier()







