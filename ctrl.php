<?php
require_once 'init.php';

getConf()->login_action = 'login';

switch ($action) {
    default : //calcView
        control('app\\controllers', 'CalcCtrl', 'generateView', ['user', 'admin']);
    case 'login' :
        control('app\\controllers', 'LoginCtrl', 'doLogin');
    case 'credCalcCompute' :
        control('', 'CalcCtrl', 'process', ['user', 'admin']);
    case 'logout' :
        control('app\\controllers', 'LoginCtrl', 'doLogout', ['user', 'admin']);
}
