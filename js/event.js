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