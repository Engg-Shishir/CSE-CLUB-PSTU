$(document).ready(function () {
  $(".projects-row-right-box").owlCarousel({
    rtl: false,
    dots: true,
    slideSpeed: 30,
    paginationSpeed: 30,
    singleItem: true,
    autoplay: true,
    loop: true,
    autoplaySpeed: 1500,
    items: 1,
  });

  $(".partner-owl").owlCarousel({
    center: true,
    singleItem: true,
    autoplay: true,
    loop: true,
    slideTransition: 'linear',
    autoplaySpeed: 2500,
    smartSpeed: 2500,
  });
});
