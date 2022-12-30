$(function () {
  $(".top__slider").slick({
    dots: true,
    arrows: false,
    autoplay: true,
    speed: 500,
    fade: true,
  });
});

const btnShowMore = document.querySelector(".btn-more");
const classHidden = document.querySelector(".category__list-hidden");

btnShowMore.addEventListener("click", function () {
  classHidden.classList.toggle("category__list-hidden");

  //   if (classHidden.classList.toggle("category__list-hidden")) {
  //     btnShowMore.textContent = "Показать контент";
  //   } else {
  //     btnShowMore.textContent = "Скрыть контент";
  //   }
});
