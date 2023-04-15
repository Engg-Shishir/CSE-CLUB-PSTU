
let mobileNav = document.getElementsByClassName('engg-shishir-fullnav');
function hamburger() {
    let mainSpan = document.getElementsByClassName('engg-shishir-nav-right-menu');
    mainSpan[0].classList.toggle('open');
    // mainSpan[1].classList.toggle('open');
    mobileNav[0].classList.toggle('active');
}