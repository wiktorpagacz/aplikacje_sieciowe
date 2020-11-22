<?php
require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getParams(&$form){
    $form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $form['interest'] = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}

function validate(&$form, &$messages){
    if(!(isset($form['amount']) && isset($form['years']) && isset($form['interest']))){
        return false;
    }

    if($form['amount'] == ""){
        $messages [] = 'Nie podano kwoty kredytu.';
    }
    if($form['years']== ""){
        $messages [] = 'Nie podano czasu spłaty.';
    }
    if($form['interest']== ""){
        $messages [] = 'Nie podano oprocentowania.';
    }

    if (count ( $messages ) != 0) return false;

    if (! is_numeric( $form['years'] )) {
        $messages [] = 'Czas spłaty w latach nie jest liczbą całkowitą.';
    }
    if (! is_numeric( $form['amount'] )) {
        $messages [] = 'Kwota kredytu nie jest liczbą całkowitą.';
    }
    if (! (is_double( $form['interest'] ) | is_numeric($form['interest']))) {
        $messages [] = 'Oprocentowanie nie jest liczbą.';
    }

    if (count ( $messages ) != 0) return false;
    else return true;
}

function process(&$form, &$result){
    $form['amount'] = intval($form['amount']);
    $form['years'] = intval($form['years']);
    $form['interest'] = floatval($form['interest']);

    $result = ($form['amount'] / ($form['years'] * 12)) * ($form['interest'] * 0.01);
    $result = round($result,2);
}

$form = null;
$result = null;
$messages = array();

getParams($form);
if ( validate($form,$messages) ) { // gdy brak błędów
    process($form,$result);
}

$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator kredytowy.');
$smarty->assign('page_header', 'Prosty kalkulator kredytowy <br />wyliczajacy rate kredytu.');
$smarty->assign('page_description', 'Uzupełnij pola formularza i naciśnij przycisk "Oblicz" by obliczyć<br />'.
                                                    'miesięczną ratę kredytu.');
$smarty->assign('form', $form);
$smarty->assign('messages', $messages);
$smarty->assign('result', $result);

$smarty->display(_ROOT_PATH.'/app/calc.tpl');