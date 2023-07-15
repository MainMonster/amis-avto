<?php 
include './php/controller.php' ;



?>

<aside class="catalog  hide-aside">
    <div class="catalog__inner">

        <form action="index.php" method="post">
            <div class="form-search form-search__icon">
                <label for="search">
                    <input class="form-search__text" name="search-field" id="search" type="text"
                        placeholder="ВВЕДИТЕ НАЗВАНИЕ ЗАПЧАСТИ"></label>
            </div>
            <div class="catalog__category category">
                <h3 class="popup__title"> Категории запчастей</h3>
                <ul class="category__list">

                    <?php foreach($category AS $key => $group ): ?>
                    <li class="category__item"><a class="category__link"
                            href="<?="category.php?category=".$group['ID'];?>"><?=$group['Group'];?></a></li>
                    <!-- <div class="category__list-hidden"> -->
                    <?php endforeach; ?>
                    <!-- </div>	 -->
                </ul>
                <!-- <a class="btn-more">Показать еще</a> -->
            </div>
			</form>
			<h3 class="popup__title">Найти по производителю</h3>
			<form action="index.php" method="post">
            <div class="form-brand">
                <label for="brand"></label>
                <div class="select-brand__arrow">
                    <select class="select-brand" id="brand" name="maker_name" >
                        <?php  foreach($makers AS $key => $maker): ?>
                        <option value="<?=$maker['ID'];?>"><?=$maker['Makers'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="availables">
                <label>
                    <input class="true-checkbox" type="checkbox" id="available" name="available"  checked>
                    <span class="custom-checkbox"></span>
                    В наличии
                </label>
            </div>
            <div class="availables">
                <label>
                    <input class="true-checkbox" type="checkbox" id="request" name="order" checked>
                    <span class="custom-checkbox"></span>
                    Под заказ
                </label>
            </div>

            <button class="search-btn" type="submit" name="search-btn"> Найти</button>
            <button class="reset-btn" type="reset"> Очистить</button>
        </form>
        <div class="popup">
    <div class="popup__inner">
        <h3 class="popup__title">Оставить заявку</h3>

        <form class="popup__form" id="sending" action="index.php" name="MyForm" method="post" accept-charset="utf-8">

            <label for="sending"></label>
            <input class="popup__name" type="text" name="name" placeholder="Ваше имя" required>
            <input class="popup__phone" type="text" name="tel" pattern="[0-9]{11}" placeholder="Телефон(11 цифр)"
                required>
            <textarea class="popup__text" name="content" rows="5" cols="30px" style="resize: none" required></textarea>
            <input class="send-btn" name="btn-sending" type="submit" value="Отправить">
        </form>
    </div>
</div>


    </div>

</aside>


