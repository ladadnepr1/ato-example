<?php
//страница регистрации или авторизации

include_once 'config.php';
?>
<header>
    <h1>Сообщения пользователя</h1>
</header>
<main>
    <div id="lsb">
        <div class="not_read">
            <ul>
                <li>
                    <a href="index.php?thisway=show_autor.php">АВТОРИЗАЦИЯ</a>
                </li>
                <li>
                    <a href="index.php?thisway=reg_index.php">РЕГИСТРАЦИЯ</a>
                </li>
            </ul>
        </div>

    </div>
    <content>
        <div class="username">
            <h3>Для входа введите свой логин и пароль.</h3>
        </div>
        <div class="title">

        </div>
        <div class="text">
            <p>Единственная настоящая роскошь — это роскошь человеческого общения.</p>
            <a href="http://xn--e1afnj0c.xn--p1ai/author/Antoine_de_Saint-Exupery/" target="_blank">Антуан де Сент-Экзюпери</a>
        </div>
    </content>
</main>
