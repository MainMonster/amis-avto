$(function () {
  $(".top__slider").slick({
    dots: true,
    arrows: false,
    autoplay: true,
    speed: 500,
    fade: true,

    //  responsive: [
    //    {
    //      breakpoint: 1024,
    //      settings: {
    //        slidesToShow: 3,
    //        slidesToScroll: 3,
    //        infinite: true,
    //        dots: true,
    //      },
    //    },
    //    {
    //      breakpoint: 600,
    //      settings: {
    //        slidesToShow: 2,
    //        slidesToScroll: 2,
    //      },
    //    },
    //    {
    //      breakpoint: 480,
    //      settings: {
    //        slidesToShow: 1,
    //        slidesToScroll: 1,
    //      },
    //    },
    //  ],
  });
});

const btnShowMore = document.querySelector(".btn-more");
const classHidden = document.querySelector(".category__list-hidden");

btnShowMore.addEventListener("click", function () {
  if (classHidden.classList.toggle("category__list-hidden")) {
    btnShowMore.textContent = "Показать еще";
  } else {
    btnShowMore.textContent = "Скрыть";
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

// Фиксированное меню

window.addEventListener("scroll", (e) => {
  let navbar = document.getElementById("navbar").classList;
  let active_class = "menu_scrolled";
  let active_menu_link = "menu__link-scrolled";

  //   Появление при условии высоты экрана 1400px
  if (pageYOffset > 1400) navbar.add(active_class, active_menu_link);
  else navbar.remove(active_class, active_menu_link);
});
