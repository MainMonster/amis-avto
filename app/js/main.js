$(function () {
  $(".top__slider").slick({
    dots: true,
    arrows: false,
    autoplay: true,
    speed: 500,
    fade: true,
  });
});

const btnShowMoreCategory = document.querySelector(".btn-more");
const hiddenClass = document.querySelector(".category__list-hidden");
const showClass = document.querySelector(".btn-hide");

btnShowMoreCategory.addEventListener("click", function () {
  hiddenClass.classList.toggle("category__list-hidden");
});
