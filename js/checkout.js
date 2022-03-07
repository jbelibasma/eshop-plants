$('#checkout').on('click', onClickCheckout);
function onClickCheckout(){
    

    let carts = loadpanier('panier');
    console.log(carts);


$.post('checkout.php',{carts} ,function(data){
// console.log(data)
saveStorage([], 'panier');
window.location.href ='showpanier.php?new_sale='+ data;

})

}
