$('#save').on('click', onClickSave);
let carts = loadpanier('panier');
  function onClickSave() {

  
// Création d'un objet cart .
          const cart = {
              id: $('input[name=id]').val(),
              img: $('#prodImg').attr('src'),
              name: $('h6').text(),
              prix: $('strong').html(),
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
 



