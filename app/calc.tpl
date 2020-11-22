{extends file="../templates/main.tpl"}

{block name="content"}

    <form method="post" action="{$app_url}/app/calc.php">
        <div class="row gtr-50 gtr-uniform">
            <div class="col-6 col-12-mobilep">
                <input type="text" name="amount" id="amount" value="{$form['amount']}" placeholder="Kwota kredytu" />
            </div>
            <div class="col-6 col-12-mobilep">
                <input type="text" name="years" id="years" value="{$form['years']}" placeholder="Okres splaty w latach" />
            </div>
            <div class="col-12">
                <input type="text" name="interest" id="interest" value="{$form['interest']}" placeholder="Oprocentowanie" />
            </div>
            <div class="col-12">
                <ul class="actions special">
                    <li><input type="submit" value="Oblicz" /></li>
                </ul>
            </div>
        </div>
    </form>
<div class="messages">
    {if isset($messages)}
        {if count ( $messages ) > 0}
            <ol>
            {foreach $messages as $msg}
                {strip}
                <li>{$msg}</li>
                {/strip}
            {/foreach}
            </ol>
        {/if}
    {/if}

    {if isset($result)}
        <h4>Wynik</h4>
        <p>
            {$result}
        </p>
    {/if}
</div>
{/block}

{*<!DOCTYPE HTML>*}
{*<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">*}
{*<head>*}
{*    <meta charset="utf-8" />*}
{*    <title>Kalkulator kredytowy</title>*}
{*    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />*}
{*    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>*}
{*    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>*}
{*</head>*}
{*<body>*}
{*<div>*}
{*    <a uk-icon="icon: sign-out" class="uk-button uk-button-default" href="<?php print(_APP_ROOT); ?>/app/security/logout.php"></a>*}
{*</div>*}
{*<div style="width:50%; margin: 2em auto; ">*}
{*    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">*}
{*        <legend>Kalkulator kredytowy.</legend>*}
{*        <fieldset>*}
{*            <label for="amount">Kwota kredytu: </label>*}
{*            <input id="amount" class="uk-input" type="text" name="amount" value="<?php out($amount); ?>" /><br />*}
{*            <label for="years">Okres spłaty w latach: </label>*}
{*            <input id="years" class="uk-input" type="text" name="years" value="<?php out($years); ?>" /><br />*}
{*            <label for="interest">Oprocentowanie: </label>*}
{*            <input id="interest" class="uk-input" type="text" name="interest" value="<?php out($interest); ?>" /><br />*}
{*        </fieldset>*}
{*        <input type="submit" class="uk-button uk-button-default" value="Oblicz" />*}
{*    </form>*}

{*<?php*}
{*//wyświeltenie listy błędów, jeśli istnieją*}

{*?>*}

{*<?php if (isset($result)){ ?>*}
{*<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color:  #00cc66; width:300px;">*}
{*<?php echo 'Wysokość miesięcznej raty wynosi: '.$result; ?>*}
{*</div>*}
{*<?php } ?>*}
{*</div>*}
{*</body>*}
{*</html>*}