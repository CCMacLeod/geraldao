<?php
    use Smarty\Smarty;
    require_once './app/libs/smarty-master/libs/Smarty.class.php';
    class geraldoSmarty extends Smarty {
        public function __construct(){
            parent::__construct();

            $this->setTemplateDir('../geraldao/app/templates');
            $this->setConfigDir('../geraldao/app/config');
            $this->setCompileDir('../geraldao/app/templates_c');
            $this->setCacheDir('../geraldao/app/cache');
            $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
            $this->assign('app_name', 'Geraldão');
        }

        function montarCamposHTML($listaCamposHTML){
            return $this->assign('listaCamposHTML',$listaCamposHTML);
        }
    }