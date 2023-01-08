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
  if (classHidden.classList.toggle("category__list-hidden")) {
    btnShowMore.textContent = "Показать контент";
  } else {
    btnShowMore.textContent = "Скрыть контент";
  }
});

$(document).ready(function () {
  $("#menu").on("click", "a", function (event) {
    //отменяем стандартную обработку нажатия по ссылке

    event.preventDefault();

    //забираем идентификатор бока с атрибута href

    var id = $(this).attr("href"),
      //узнаем высоту от начала страницы до блока на который ссылается якорь

      top = $(id).offset().top;

    //анимируем переход на расстояние - top за 1500 мс

    $("body,html").animate({ scrollTop: top }, 1500);
  });
});
