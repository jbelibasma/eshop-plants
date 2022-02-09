"user strict";
let link =document.querySelectorAll('.link');
let div=document.querySelectorAll('.div')
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
//creation d'un objet cart
const carts={
    id:$
}