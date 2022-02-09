"use strict";
var regist=document.querySelector('.bi-chevron-compact-up');
var p=document.querySelectorAll('.slidregis');
regist.addEventListener('click', register)
let i=0;
let rgisterslid ;

function register() {
      if(i==p.length-1){
         p[i].classList.remove('show');
         p[i].classList.add('hide')
         i=0
         p[i].classList.remove('hide')
         p[i].classList.add('show');
      }
      else{
         p[i].classList.remove('show');
         p[i].classList.add('hide');
          i++
          p[i].classList.remove('hide');
          p[i].classList.add('show');
      }
     
}

function playreg() {
    rgisterslid=setInterval(
        function register() {
            if(i==p.length-1){
               p[i].classList.remove('show');
               p[i].classList.add('hide')
               i=0
               p[i].classList.remove('hide')
               p[i].classList.add('show');
            }
            else{
               p[i].classList.remove('show');
               p[i].classList.add('hide');
                i++
                p[i].classList.remove('hide');
                p[i].classList.add('show');
            }
      
    }, 2000);
}
    playreg();
