<?php
$conf->app_root = '/aplikacje_sieciowe';
$conf->server_name = 'localhost';
$conf->server_url = 'http://'.$conf->server_name;
$conf->action_root = $conf->app_root.'/ctrl.php?action=';

$conf->action_url = $conf->server_url.$conf->action_root;
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path= dirname(__FILE__);