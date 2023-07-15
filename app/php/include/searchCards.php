<?php 
$goodsSearch = searchInGoods($_POST['search-field'], 'amis_ru_goods');
?>
<div class="cards__wrapper ">

    <?php foreach($goodsSearch AS $key => $good ): ?>
    <a class="card__link" href="#">
        <div class="card">

            <?php  if ($good['Status']): ?>
            <div class="card__order card__order--available"> В наличии </div>
            <?php else: ?>
            <div class="card__order card__order--order"> Под заказ </div>
            <?php endif; ?>

            <div class="card__img">
            </div>
            <div class="card__content">
                <div class="card__category"><?=$good['Name'];?></div>
                <div class="card__brand">Model...<?=$good['Model'];?></div>
                <div class="card__model">Vol...<?=$good['Vol'];?></div>
                <div class="card__stamp"><?=$good['Year'];?></div>
                <div class="card__stamp">Совместимость...<?=$good['Compatibility'];?></div>
                <div class="card__OEM"><?=$good['Full_descr'];?></div>
                <div class="card__price">Price...<?=$good['Price'];?></div>
            </div>
            <div class="card__btn"> Подробнее</div>



        </div>
    </a>
    <? endforeach; ?>

</div>

