$(function () {
  var number = 0;
  toggleFaq = function (elm) {
    // $(elm).siblings(".answer").slideToggle();
    if (number == elm) {
      $(".answer" + elm).slideToggle();
      $(".fa-angle-down-" + elm).toggleClass("active");
    } else {
      number = elm;
      $(".answer").slideUp();
      $(".fa-angle-down").removeClass("active");
      $(".answer" + elm).slideToggle();
      $(".fa-angle-down-" + elm).toggleClass("active");
    }
  };
});
