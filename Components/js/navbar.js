
let mobileNav = document.getElementsByClassName('engg-shishir-fullnav');
function hamburger() {
    let mainSpan = document.getElementsByClassName('engg-shishir-nav-right-menu');
    mainSpan[0].classList.toggle('open');
    // mainSpan[1].classList.toggle('open');
    mobileNav[0].classList.toggle('active');
}





const list = document.querySelectorAll('.tab-li');
var tt = document.querySelectorAll(".tab-li-content");

function tabActiveLink(){
    list.forEach((item,i) =>{
       item.classList.remove('tab-li-active');
       this.classList.add('tab-li-active');
   });
}

list.forEach((item,i) =>{
   var index=0;
   item.addEventListener('click',tabActiveLink);

   item.addEventListener('click', () => {
        index = i;
        tt.forEach((item,j) =>{
            item.classList.remove('tab-li-content-active');
            if(i==j){
                item.classList.add('tab-li-content-active');
            }
        });
   });
   
});




let navbar = document.getElementsByClassName('engg-shishir-navbar');
// let animatedCircle = document.getElementsByClassName('video-circle');
window.addEventListener("scroll",function(){
    var height = window.scrollY;

    // Show navbar when page scroll more than 400px
    if(height > 200){
        navbar[0].classList.add('engg-shishir-navbar-show');
    }else{
        navbar[0].classList.remove('engg-shishir-navbar-show');
    }
});
