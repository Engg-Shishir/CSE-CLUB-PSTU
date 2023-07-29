
let mobileNav = document.getElementsByClassName('engg-shishir-fullnav');
function hamburger() {
    let mainSpan = document.getElementsByClassName('engg-shishir-nav-right-menu');
    mainSpan[0].classList.toggle('open');
    // mainSpan[1].classList.toggle('open');
    mobileNav[0].classList.toggle('active');
}



const list = document.querySelectorAll('.accordion__item');

function tabActiveLink(){
    this.classList.toggle('active');
    this.children[1].classList.toggle("ac-active");
}

list.forEach((item,i) =>{
   item.addEventListener('click',tabActiveLink);
});




