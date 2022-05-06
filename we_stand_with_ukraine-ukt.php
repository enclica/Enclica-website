<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'login';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/1055/5472/3648.jpg?hmac=1c293cGVlNouNQsjxT8y3nsYO-7qLCaOBEGvih0ibEU); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <p>Перекладена сторінка Enclica (ETP)</p>
            <a href="we_stand_with_ukraine">English translation.</a>
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Ми з Україною &#127482;&#127462;
                </h1>
                <p class="col-md-8 fs-4">Enclica - У нас є інформація та посилання на підтримку для українців для тих, хто в Україні та інших</p>
                <p>Деякі відомості на цій сторінці можуть викликати тривогу для деяких, якщо ви хочете продовжити, зробіть це з попередженням. Якщо ви з піти <a href="/">натисніть тут</a></p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <h3>Що відбувається в Україні?</h3>
                        <p>Ми напишемо скорочену версію подій, що відбуваються в Україні. Наші джерела безпосередньо з новин, будь ласка, проведіть власне дослідження і не покладайтеся на нас, ми знаємо так само, як і ви.</p>
                        <p>Російська Федорація оголосила про війну з Україною на кордоні. Путін хоче взяти Україну, оскільки він не вважає, що Україна має бути окремою державою, а натомість бути окремою від Росії. Ми не збираємося поширювати теорії, але це те, що він сказав.</p>
                        <p>Путін не має права вторгнутися в Україну, але вони мають. НАТО (Організація Північноатлантичного договору) заявила, що не буде вводити війська в Україну, оскільки Україна не входить до НАТО.</p>
                        <h3>Хтось загинув в Україні через цю війну?</h3>
                        <p>На жаль, люди були вбиті російськими військовими. Ми не можемо відстежити кількість загиблих. Але ми висловлюємо співчуття родинам, які постраждали від цієї кризи.</p>
                        <h3>Що роблять світові лідери для підтримки України.</h3>
                        <p>З точки зору України, просто допомагають постачати зброю в Україну. На Росію, з іншого боку, вводяться санкції, щоб запобігти міжнародній торгівлі та вплинути на їхню економіку.</p>


                        <h3>Чим я можу допомогти?</h3>
                        <p>Є речі, які ви можете зробити, щоб допомогти українцям, а саме пожертвувати благодійним організаціям України, ми надали посилання для підтримки України, де ви можете зробити пожертви.</p>
                        <!-- Razom for Ukraine a tag with the href="https://razomforukraine.org/" -->
                            <p>Razom for Ukraine</p>
                            <a href="https://razomforukraine.org/" class="n-o" target="_blank">
                                <img src="https://razomforukraine.org/wp-content/themes/heartfelt/img/razom_logo_2.png" alt="Razom for Ukraine" width="200">
                            </a>

                            <!-- ICRC charity link -->
                            <p>ICRC</p>
                            <a href="https://www.icrc.org/en/donate/ukraine" class="n-o" target="_blank">
                                <img src="https://www.icrc.org/sites/default/themes/icrc_theme/images/en/logo.png" alt="ICRC" width="100">
                            </a>


                        <p>ВІДМОВА ВІД ВІДПОВІДАЛЬНОСТІ: МИ НЕ ПОВ’ЯЗАНО З ЖОДНОЮ ІЗ Вищевказаних благодійних організацій.</p>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/login.js"></script>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {

    include dirname(__FILE__) . '/inc/footer.php';
}
?>