// show category
var link =document.querySelectorAll('.link');
var div=document.querySelectorAll('.div');
function clicked(){
    let category=this.dataset.id;
    let id=document.getElementById(category);
    for(let i=0;i<div.length;i++){
        div[i].classList.add('hide');
    }
    id.classList.remove('hide');
}
for(let index=0;index<link.length;index++){
    link[index].addEventListener('click',clicked)

}

/*** panier */
$('#save').on('click', onClickSave); 
   var carts = loadpanier('panier');

  function onClickSave() {

  
// Création d'un objet cart .
          const cart = {
              id: $('input[name=id]').val(),
              name: $('h2').text(),
              img: $('#imageId').attr('src'),
              prix: $('#strong').html(),
              quantity: $('#quantity').val(),
          }
     // id produit qui ajouter = id produit ds panier      
          let qt= carts.find(key=>key.id==cart.id);
       
          if(qt!=undefined){
              cart.quantity=parseInt( cart.quantity);
              qt.quantity=parseInt( qt.quantity);
              let index = carts.indexOf(qt);
              carts[index]['quantity']+=cart.quantity;
        

          }
          else{
              carts.push(cart);

          }
          saveStorage(carts, 'panier');
          console.log(carts);

       
          // refreshpanier();
  }
  
    

  function loadpanier(panier) {
      var storage = JSON.parse(localStorage.getItem(panier));
      if (storage == null)
          storage = [];
      return storage
  }

  function saveStorage(data, panier) {
      var storage = JSON.stringify(data);
      localStorage.setItem(panier, storage);
  }
 


