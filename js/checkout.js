$('#checkout').on('click', onClickCheckout);
function onClickCheckout(){
    
// alert('ok')

    let carts = loadpanier('panier');
    // console.log(carts);


$.post('checkout.php',{carts} ,function(data){
// console.log(data)
saveStorage([], 'panier');
window.location.href ='affich.php?new_sale='+ data;

})

}
