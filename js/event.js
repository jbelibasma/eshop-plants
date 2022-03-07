'use strict';
function onClickSend(e){
    e.preventDefault();


    let comments={
        pseudo:$('#pseudo').val(),
        comment:$('#comments').val(),
        id:$('#id').val()
    }


    $.post('comments.php',comments ,function(data){
        $('#affich').html(data);
         $('#affich').show();


    })

}

function onClickSupp(){
    if(confirm("voulez vous vrm supprimer")){
    // let href=$('<a>').attr('href','supprim.php?')
    let link= $(this).attr('href');
    let click= $(this);
    $.get(link,function(){
        click.parent().parent().remove();
    })

}}

/** btn menu mobil */
let butn=document.querySelector('.mobil-nav');
let menu=document.getElementById('menu-nav');
console.log(menu)
function showmenu(){
    menu.classList.toggle('nav');
    menu.classList.toggle('active-menu');

}
butn.addEventListener('click', showmenu);
/** end menu mobil */


