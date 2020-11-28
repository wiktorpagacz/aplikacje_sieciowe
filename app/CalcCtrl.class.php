<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

    private $messages;
    private $form;
    private $result;

    public function __construct()
    {
        $this->messages = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    public function getParams(){
        $this->form->amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
        $this->form->years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
        $this->form->interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
    }

    public function validate()
    {
        if (!(isset($this->form->amount) && isset($this->form->years) && isset($this->form->interest))) {
            return false;
        }

        if ($this->form->amount == "") {
            $this->messages->addError('Nie podano kwoty kredytu.');
        }
        if ($this->form->years == "") {
            $this->messages->addError('Nie podano czasu spłaty.');
        }
        if ($this->form->interest == "") {
            $this->messages->addError('Nie podano oprocentowania.');
        }

        if (! $this->messages->isError()) {
            if (!is_numeric($this->form->years)) {
                $this->messages->addError('Czas spłaty w latach nie jest liczbą całkowitą.');
            }
            if (!is_numeric($this->form->amount)) {
                $this->messages->addError('Kwota kredytu nie jest liczbą całkowitą.');
            }
            if (!(is_double($this->form->interest) | is_numeric($this->form->interest))) {
                $this->messages->addError('Oprocentowanie nie jest liczbą.');
            }

            return !$this->messages->isError();
        }
    }


    public function process(){
        $this->getParams();

        if ($this->validate()) {
            $this->form->amount = intval($this->form->amount);
            $this->form->years = intval($this->form->years);
            $this->form->interest = floatval($this->form->interest);
            $this->messages->addInfo('Parametry poprawne');

            $this->result->result = ($this->form->amount / ($this->form->years * 12)) * ($this->form->interest * 0.01);
            $this->result->result = round($this->result->result, 2);

            $this->messages->addInfo('Wykonano obliczenia.');
        }

        $this->generateView();

    }

    public function generateView(){
        global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf', $conf);

        $smarty->assign('page_title', 'Kalkulator kredytowy.');
        $smarty->assign('page_header', 'Prosty kalkulator kredytowy <br />wyliczajacy rate kredytu.');
        $smarty->assign('page_description', 'Uzupełnij pola formularza i naciśnij przycisk "Oblicz" by obliczyć<br />'.
            'miesięczną ratę kredytu.');

        $smarty->assign('form', $this->form);
        $smarty->assign('messages', $this->messages);
        $smarty->assign('result', $this->result);

        $smarty->display($conf->root_path.'/app/CalcView.tpl');
        }
}
