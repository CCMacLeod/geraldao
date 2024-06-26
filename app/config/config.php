<?php
    getEnvParametros();
    $base_url = 'http://localhost/projetos/geraldao';

    require_once './app/libs/tinyButStrong/clsTinyButStrong.php';
    require_once './app/libs/tinyButStrong/tbs_plugin_opentbs.php';
    // Criação do objeto da biblioteca que vai realizar o merge dos dados que virão do formulário e/ou banco de dados
    $tbs = new clsTinyButStrong;
    $tbs->PlugIn(TBS_INSTALL, OPENTBS_PLUGIN);

    require_once './app/class/arquivo.php';
    // Criação do objeto que vai manipular os arquivos ODT para retirar os parâmetros do texto
    $extrator = new arquivo;

    require_once './app/class/geraldoSmarty.php';
    // Criação do objeto que vai manipular templates de apresentação
    $tpl = new geraldoSmarty;
    $tpl->assign('base_url', $base_url);
    $tpl->debugging = true;

    // Variáveis iniciais
    $tpl->assign('mensagem', ['texto' => '', 'tipo' => '']);


    require_once './app/control/Controle.php';
    require_once './app/control/GeraldoControle.php';
    // Criação do objeto que vai controlar todas as requisições
    $controle = new Controle;

    require_once('./app/modelo/Banco.php');
    $conn = new Banco();
    // try{
    //     $conn->conectaOracle();
    // }catch(Exception $e){
    //     $e = oci_error();
    //     var_dump(trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR));
    // }
    // Identificar o sistema operacional
    $os = PHP_OS;

    // Definir a variável que vai guardar o caminho do projeto
    $diretorioProjeto = '';
    // Definir a variável que vai guardar o caminho dos arquivos
    $diretorioArquivos = '';

    if (stripos($os, 'WIN') !== false) {
        // Se for Windows
        $diretorioProjeto = 'C:\\xampp\\htdocs\\projetos\\geraldao';
        $diretorioArquivos = 'C:\\xampp\\htdocs\\projetos\\geraldao\\arquivosODT';
    } else {
        // Se for Linux
        $diretorioProjeto = '/var/www/html/geraldao';
        $diretorioArquivos = '/var/www/html/geraldao/arquivosODT';
    }
    function getEnvParametros() {
        $envs = parse_ini_file('./.env', true);
        foreach ($envs as $key => $value) {
            putenv($key .'=' . $value);
        }
    }