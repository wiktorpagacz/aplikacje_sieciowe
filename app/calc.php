<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

//Pobranie parametrów
function getParams(&$amount, &$years, &$interest){
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}
// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

function validate(&$amount, &$years, &$interest, &$messages){
    if(!(isset($amount) && isset($years) && isset($messages))){
        return false;
    }

    if($amount == ""){
        $messages [] = 'Nie podano kwoty kredytu.';
    }
    if($years == ""){
        $messages [] = 'Nie podano czasu spłaty.';
    }
    if($interest == ""){
        $messages [] = 'Nie podano oprocentowania.';
    }

    if (count ( $messages ) != 0) return false;

    if (! is_numeric( $years )) {
        $messages [] = 'Czas spłaty w latach nie jest liczbą całkowitą.';
    }
    if (! is_numeric( $amount )) {
        $messages [] = 'Kwota kredytu nie jest liczbą całkowitą.';
    }
    if (! (is_double( $interest ) | is_numeric($interest))) {
        $messages [] = 'Oprocentowanie nie jest liczbą.';
    }

    if (count ( $messages ) != 0) return false;
    else return true;
}

function process(&$amount, &$years, &$interest, &$result){
    $amount = intval($amount);
    $years = intval($years);
    $interest = floatval($interest);

    $result = ($amount / ($years * 12)) * ($interest * 0.01);
    $result = round($result,2);
}

$amount = null;
$years = null;
$interest = null;
$result = null;
$messages = array();

getParams($amount,$years,$interest);
if ( validate($amount,$years, $interest,$messages) ) { // gdy brak błędów
    process($amount, $years,$interest,$result);
}

include 'calc_view.php';