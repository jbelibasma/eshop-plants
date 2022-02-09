function loadData(carts){
 const jsonData=window.localStorage.getItem(carts);
 return JSON.parse(jsonData);
}
function saveData(carts,panier){
    const JSON=Stringify(jsonData);
    window.localStorage.setItem(carts,panier); 
}