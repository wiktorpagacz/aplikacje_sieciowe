<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie do kalkulatora kredytowego</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />\
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
</head>
<body>

<div style="width:30%; margin: 2em auto;">

    <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
        <legend class="uk-legend">Logowanie</legend>
        <fieldset class="uk-fieldset">
            <label for="login">Login: </label>
            <input id="login" class="uk-input" type="text" name="login" value="<?php out($form['login']); ?>" />
            <label for="pass">Hasło: </label>
            <input id="pass" class="uk-input" type="password" name="pass" />
        </fieldset>
        <input type="submit" class="uk-button uk-button-default" value="Zaloguj"/>
    </form>

    <?php
    //wyświeltenie listy błędów, jeśli istnieją
    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
    ?>

</div>

</body>
</html>