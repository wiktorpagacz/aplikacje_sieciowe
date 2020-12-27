<?php

namespace app\controllers;

class ResultCtrl {

    private $result;

    public function action_results(){

        try{
            $database = new \Medoo\Medoo([
                'database_type' => 'mysql',
                'database_name' => 'kalk',
                'server' => 'localhost',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_polish_ci',
                'port' => 3306,
                'option' => [
                    \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            ]);

           $datas = $database->select("wynik", "*"
//                ["idwynik",
//                "kwota",
//                "lat",
//                "procent",
//                "rata",
//                "data"
//            ]);
            );

            $this->result=$datas;

            $this->generateView();

        } catch (\PDOException $ex) {
            getMessages()->addError("DB Error: ".$ex->getMessage());
        }
    }

    public function generateView(){

        getSmarty()->assign('user', unserialize($_SESSION['user']));

        getSmarty()->assign('page_title', 'Wyniki.');

        getSmarty()->assign('records', $this->result);

        getSmarty()->display('ResultView.tpl');
    }

}