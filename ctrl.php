<?php
require_once 'init.php';

switch ($action) {
    default : //calcView
        $ctrl = new app\controllers\CalcCtrl();
        $ctrl->generateView();
    break;
    case 'credCalcCompute' :
        $ctrl = new app\controllers\CalcCtrl();
        $ctrl->process();
    break;
}
