<?php

require_once dirname(__FILE__).'/../config.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    default : //calcView
        include_once $conf->root_path.'/app/creditcalc/CalcCtrl.class.php';
        $ctrl = new CalcCtrl();
        $ctrl->generateView();
    break;
    case 'credCalcCompute' :
        include_once $conf->root_path.'/app/creditcalc/CalcCtrl.class.php';
        $ctrl = new CalcCtrl();
        $ctrl->process();
    break;
}
