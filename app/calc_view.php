<?php
// KONTROLER strony kalkulatora kredytowego
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
</head>
<body>
<div>
    <a uk-icon="icon: sign-out" class="uk-button uk-button-default" href="<?php print(_APP_ROOT); ?>/app/security/logout.php"></a>
</div>
<div style="width:50%; margin: 2em auto; ">
    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
        <legend>Kalkulator kredytowy.</legend>
        <fieldset>
            <label for="amount">Kwota kredytu: </label>
            <input id="amount" class="uk-input" type="text" name="amount" value="<?php out($amount); ?>" /><br />
            <label for="years">Okres spłaty w latach: </label>
            <input id="years" class="uk-input" type="text" name="years" value="<?php out($years); ?>" /><br />
            <label for="interest">Oprocentowanie: </label>
            <input id="interest" class="uk-input" type="text" name="interest" value="<?php out($interest); ?>" /><br />
        </fieldset>
        <input type="submit" class="uk-button uk-button-default" value="Oblicz" />
    </form>

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color:  #00cc66; width:300px;">
<?php echo 'Wysokość miesięcznej raty wynosi: '.$result; ?>
</div>
<?php } ?>
</div>
</body>
</html>