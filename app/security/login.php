<?php
require_once dirname(__FILE__).'/../../config.php';

function getParamsLogin(&$form){
    $form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $form['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}

function validateLogin(&$form, &$messages){
    if (!(isset($form['login']) && isset($form['pass']))){
        return false;
    }

    if($form['login'] == ""){
        $messages [] = 'Nie wprowadzono loginu.';
    }
    if($form['pass'] == ""){
        $messages [] = 'Nie wprowadzono hasła.';
    }

    if(count ($messages) > 0) return false;

    if ($form['login'] == "admin" && $form['pass'] == "123") {
        session_start();
        $_SESSION['role'] = 'admin';
        return true;
    }
    if ($form['login'] == "user" && $form['pass'] == "123") {
        session_start();
        $_SESSION['role'] = 'user';
        return true;
    }

    $messages [] = 'Niepoprawny login lub hasło';
    return false;
}

$form = array();
$messages = array();

getParamsLogin($form);

if (!validateLogin($form, $messages)){
    include _ROOT_PATH.'/app/security/login_view.php';
}else{
    header("Location: "._APP_URL.'/app/calc.php');
}
