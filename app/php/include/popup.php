
<link rel="stylesheet" href="../app/css/style.min.css" />
<div class="popup modal hidden" data-modal id="popup">
    <div class="popup__inner ">
        <a href="#" class = 'close-popup' id=""></a>
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