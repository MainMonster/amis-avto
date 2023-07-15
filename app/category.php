<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/amis-avto/app/php/database/db.php";
//$goods = selectAll('amis_ru_goods');
//test($goods);
//include './php/controller.php' ;
include './php/include/header.php';

$searchInCategory =  searchInCategory('amis_ru_group_goods', 'amis_ru_goods', $_GET['category']);

?>

<div class="main">
    <!--	Выбор запчасти, каталог -->
    <?php include './php/include/sidebar.php'?>
    <!--	Карточки товара  -->
    <div class="cards">
        <div class="cards__wrapper ">

            <?php foreach($searchInCategory AS $key => $good ): ?>
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
  

    </div>
</div>

<section class="company" id="company">
    <h1 class="company__title anim__title">о компании</h1>
    <div class="company__text">
        <p>Компания "Амис-Авто" существует на рынке запчастей Дальнего Востока более 10 лет и
            специализируется преимущественно на поставках из Японии дизельных двигателей в сборе, первой
            комплектации, со всем навесным оборудованием, коробка (МКПП), стартер, генератор, ТНВД.
        </p>
        <p> Наша компания завозит моторы с небольшим пробегом и в хорошем техническом состоянии. Гораздо
            выгоднее приобрести у нас подержаный мотор, чем заниматься его ремонтом.
        </p>
        <p>Мы имеем постоянных прямых поставщиков в Японии, которые сотрудничают с нами в течении многих
            лет. В Японии формируют заказ двигателей, загружают в контейнеры. Контейнеры приходят из Японии
            с периодичностью 4-8 недели. Двигатели проходят первое тестирование в Японии, где их моют и
            лакируют специальным антикоррозийным составом. Продажа двигателей осуществляется по
            справке-счету или договору купли-продажи с приложением всех необходимых документов для
            последующих регистрационных действий по замене номерного агрегата или перепродажи. Уже при
            непосредственной продаже двигателя, его проверяют на стенде в присутствии клиента, а также
            устанавливается срок в 10 дней на выявление скрытых дефектов, не обнаруженных при тестировании.
            На стенде двигатель проверяется по следующим параметрам:
            запуск
            головка блока (наличие газов в радиаторе)
            компрессия в цилиндрах
            работа ТНВД
            цвет выхлопных газов
            давление масла
            Для иногородних клиентов можем осуществлять отправку двигателей до места назначения. Доставка по
            России через Желдорэкспедицию http://www.jde.ru/ или Деловые линии http://www.dellin.ru/ с
            оплатой доставки на месте получения груза.
        </p>

    </div>
</section>
<!-- Раздел услуги -->
<section class="services" id="services">
    <h1 class="services__title anim__title">
        Услуги
    </h1>
    <div class="services__wrapper">
        <div class="card-service box">

            <div class="card-service__title">Оформление документов</div>
            <div class="card-service__text">Вся необходимая сопроводительная документация</div>
        </div>
        <div class="card-service box">

            <div class="card-service__title">АГЕНТСКИЕ УСЛУГИ</div>
            <div class="card-service__text">Таможенное декларирование авто и спецтехники</div>
        </div>
        <div class="card-service box">

            <div class="card-service__title">ПОКУПКА НА АУКЦИОНАХ</div>
            <div class="card-service__text">Покупка через аукционы Японии, легковых автомобилей и грузовой
                техники</div>
        </div>
        <div class="card-service box">

            <div class="card-service__title">БЕЗОПАСНОСТЬ</div>
            <div class="card-service__text">Транспортировка с таможенных складов эвакуаторами под охраной
            </div>
        </div>
        <div class="card-service box">

            <div class="card-service__title">ЛЮБАЯ ФОРМА ОПЛАТЫ</div>
            <div class="card-service__text">
                <ul class="card-service__text">
                    <li>Наличными</li>
                    <li>Оплата по реквизитам для юр.лиц</li>
                    <li>Оплата переводом на счетдля физ.лиц</li>
                </ul>

            </div>
        </div>
        <div class="card-service box">

            <div class="card-service__title">ГЕОГРАФИЯ</div>
            <div class="card-service__text">Доставка по России через Желдорэкспедицию http://www.jde.ru/ или
                Деловые линии http://www.dellin.ru/ с оплатой доставки на месте получения груза. </div>
        </div>
    </div>
</section>
<!-- Раздел Декларирование -->
<section class="declaring" id="declar">
    <h1 class="declaring__title anim__title">Таможенное декларирование</h1>
    <div class="declaring__text">
        <p>Компания ООО «Амис-Авто» уже более 10-ти лет работает на внешнеэкономическом рынке. Нас знают во
            Владивостоке, Хабаровске, Иркутске, Амурской и Новосибирской областях, а также в других регионах
            РФ, где компания ведет активную работу по продаже запчастей и двигателей для большегрузных и
            легковых автомобилей. Всю информацию об имеющемся ассортименте запчастей вы можете посмотреть в
            разделе КАТАЛОГ.</p>
        <p>ООО «Амис-Авто» является крупным контрактодержателем, занимается ввозом автомобильной техники на
            территорию Российской Федерации. Многие наши клиенты самостоятельно привозят автомобили, а мы
            помогаем им быстро и недорого оформить таможенные и сопутствующие документы. Это позволяет
            значительно ускорить процесс выхода автомобилей на дороги и рынки России.</p>
        <p>Для того чтобы сотрудничать с ООО «Амис-Авто», достаточно при отправке автомобиля из Японии
            указать в судовом коносаменте правильные реквизиты компании:</p>
        <p>грузополучатель: ООО «Амис-Авто»;
            местонахождение: г. Владивосток, ул. Бородинская, 14 .
            В дальнейшем нужно связаться с нами по телефону: (4232) 43-07-67, Fax43-08-28
            и предоставить все необходимые сведения для идентификации вашего автомобиля и правильного
            оформления документов владения и распоряжения транспортным средством.</p>
        <p>Хотим напомнить нашим потенциальным партнерам, что возраст автомобилей, ввозимых в РФ, не должен
            превышать 7 лет (месяц в месяц) на дату подачи Грузовой Таможенной Декларации. Если это условие
            не выполняется, то сумма таможенных платежей возрастает многократно, а общие затраты на
            транспортное средство (покупка в Японии + транспортировка в Россию + "таможенная очистка" +
            расходы по доставке к месту эксплуатации) по отношению к возрасту автомобиля становятся
            экономически невыгодными.</p>
        <p>ООО «Амис-Авто» по желанию клиентов осуществляет регистрацию транспортных средств в ГИБДД,
            производит процедуру постановки на учет/снятия с учета автомобиля, оформляет справки-счет,
            договоры, нотариальные доверенности на физические или юридические лица.
            Также наша копания помогает своим клиентам отправить автомобили в любой регион РФ. Желаем Вам
            удачи!</p>



    </div>

</section>
<!-- truck Декор -->
<div class="truck">
    <div class="truck__img-container">

        <div class="truck__text">НАШИ ПРЕИМУЩЕСТВА -
            ДОСТУПНОСТЬ, ПРОЗРАЧНОСТЬ,
            БОЛЬШОЙ ОПЫТ!</div>
    </div>
</div>


</div>
</div>
</div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">

            <div class="footer__inner">
                <img class="logo" src="images/logo.jpg" alt="" />
                <div class="footer__public-text">АМИС АВТО </div>
                <span>ВАШ НАДЕЖНЫЙ ПАРТНЕР</span>

            </div>
            <div class="footer__inner">
                <nav class="footer__menu menu-footer">
                    <ul class="footer-menu__list">
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">Главная</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">О компании</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">Услуги</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">Декларирование</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">Контакты</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="footer__inner">
                <nav class="footer__menu menu-footer">
                    <ul class="footer-menu__list">
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">NISSAN</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">FUSO</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">ISUZU ELF</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">ISUZU</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">TOYOTA</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="footer__inner">

                <nav class="footer__menu menu-footer">
                    <ul class="footer-menu__list">
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="tel:89025575565">8-902-557-55-65</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="https://wa.me/89046299852">8-904-629-98-52</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">г. Владивосток, <br> Бородинская, 14</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="#">Схема проезда</a>
                        </li>
                        <li class="footer-menu__list-item">
                            <a class="footer-menu__link" href="mailto:amisavto@mail.ru">amisavto@mail.ru</a>
                        </li>
                    </ul>
                </nav>


            </div>
        </div>

    </div>
    <div class="footer__copyrigh">© 2009 – 2022 АМИС АВТО</div>
</footer>

<!-- <script src="js.main.js"></script> -->
<script src="js/main.min.js"></script>

</body>

</html>