//Side bar de ladmin

let navbtn = document.getElementById('navbtn');
let checkbox = document.getElementById('checkbox');
let side_bar = document.querySelector('.side-bar');
let user_p = document.querySelector('#user-p');
let span = document.querySelectorAll('.body .side-bar a span');

let compteur = 0;

checkbox.addEventListener('change',function(){
    
    if(compteur%2 == 0){
        side_bar.style.width = '85px';
        user_p.style.visibility = 'hidden';
        user_p.style.marginTop='-100px';
        for(let i = 0; i<span.length;i++){
            span[i].style.display='none';
        }
        compteur++;
    }else{
        side_bar.style.width = '250px';
        user_p.style.visibility = 'visible';
        user_p.style.marginTop='10px';
        for(let i = 0; i<span.length;i++){
            span[i].style.display='inline';
        }
        compteur++;
    }
    
});
