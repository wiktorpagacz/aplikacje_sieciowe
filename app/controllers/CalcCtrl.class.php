<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

    private $form;
    private $result;

    public function __construct()
    {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    public function getParams(){
        $this->form->amount = getFromRequest('amount');
        $this->form->years = getFromRequest('years');
        $this->form->interest = getFromRequest('interest');
    }

    public function validate()
    {
        if (!(isset($this->form->amount) && isset($this->form->years) && isset($this->form->interest))) {
            return false;
        }

        if ($this->form->amount == "") {
            getMessages()->addError('Nie podano kwoty kredytu.');
        }
        if ($this->form->years == "") {
            getMessages()->addError('Nie podano czasu spłaty.');
        }
        if ($this->form->interest == "") {
            getMessages()->addError('Nie podano oprocentowania.');
        }

        if (! getMessages()->isError()) {
            if (!is_numeric($this->form->years)) {
                getMessages()->addError('Czas spłaty w latach nie jest liczbą całkowitą.');
            }
            if (!is_numeric($this->form->amount)) {
                getMessages()->addError('Kwota kredytu nie jest liczbą całkowitą.');
            }
            if (!(is_double($this->form->interest) | is_numeric($this->form->interest))) {
                getMessages()->addError('Oprocentowanie nie jest liczbą.');
            }

            return ! getMessages()->isError();
        }
    }


    public function action_credCalcCompute(){
        $this->getParams();

        if ($this->validate()) {
            $this->form->amount = intval($this->form->amount);
            $this->form->years = intval($this->form->years);
            $this->form->interest = floatval($this->form->interest);
            getMessages()->addInfo('Parametry poprawne');

            $this->result->result = ($this->form->amount / ($this->form->years * 12)) *  ($this->form->interest * 0.1);
            $this->result->result = round($this->result->result, 2);

            getMessages()->addInfo('Wykonano obliczenia.');

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

                $database->insert("wynik", [
                    "kwota" => $this->form->amount,
                    "lat" => $this->form->years,
                    "procent" => $this->form->interest,
                    "rata" => $this->result->result,
                    "data" => date("Y-m-d H:i:s")
                ]);

            } catch (\PDOException $ex) {
                getMessages()->addError("DB Error: ".$ex->getMessage());
            }
        }

        $this->generateView();

    }

    public function action_calcShow(){
        getMessages()->addInfo('Witaj w kalkulatorze');
        $this->generateView();
    }

    public function generateView(){

        getSmarty()->assign('user', unserialize($_SESSION['user']));

        getSmarty()->assign('page_title', 'Kalkulator kredytowy.');

        getSmarty()->assign('form', $this->form);
        getSmarty()->assign('result', $this->result);

        getSmarty()->display('CalcView.tpl');
    }
}
