
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
let animatedCircle = document.getElementsByClassName('video-circle');
let fixedFirsrtSection = document.getElementsByClassName('engg-shishir-fixed');
window.addEventListener("scroll",function(){  
    var height = window.scrollY;
    var animatedCircle_height = animatedCircle[0].clientHeight;
    var animated_circle_height_calc = animatedCircle_height - height * 1.15;
    animatedCircle[0].style.clipPath =
      "circle(" + animated_circle_height_calc + "px at 100% 0)";
  
    // scroll up
    if (this.oldScroll > this.scrollY) {
      if (height < 120) {
        animatedCircle[0].style.clipPath = "circle(" + 63 + "% at 100% 0)";
        // sir1[0].style.transform  = "translateY(0)";
      } else {
      }
      console.log("Scroll Up");
    }
    // Scroll Down
    else {
      if (height > 550) {
        animatedCircle[0].style.clipPath = "circle(0% at 100% 0)";
        // sir1[0].style.transform  = "translateY(-10%)";
      } else {
      }
      console.log("Scroll Down");
    }
  
    this.oldScroll = this.scrollY;

    // Show navbar when page scroll more than 400px
    if(height > 600){
        navbar[0].classList.add('engg-shishir-navbar-show');
        fixedFirsrtSection[0].classList.add('opacityChange');
    }else{
        navbar[0].classList.remove('engg-shishir-navbar-show');
        fixedFirsrtSection[0].classList.remove('opacityChange');
    }
});

















const seduleTab = document.querySelectorAll('.shedule-tab-btn');
var seduleTabContent = document.querySelectorAll(".shedule-content");

function seduleTabActiveLink(){
  seduleTab.forEach((item,i) =>{
       item.classList.remove('shedule-tab-btn-active');
       this.classList.add('shedule-tab-btn-active');
   });
}

seduleTab.forEach((item,i) =>{
   var index=0;
   item.addEventListener('click',seduleTabActiveLink);

   item.addEventListener('click', () => {
        index = i;
        seduleTabContent.forEach((item,j) =>{
            item.classList.remove('shedule-content-active');
            if(i==j){
                item.classList.add('shedule-content-active');
            }
        });
   });
   
});
