<?php
    require_once 'app/config/config.php';

    // Captura a URL amigável
    $url = isset($_REQUEST['url']) ? $_REQUEST['url'] : 'Geraldo/index';
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);

    // Defina o controlador e a ação
    $nomeControle = !empty($url[0]) ? $url[0] : 'Geraldo';
    $acao = !empty($url[1]) ? $url[1] : 'index';   

    // Chama o método para gerenciar o controlador solicitado
    $controle->requisicao($nomeControle, $acao, array_slice($url, 2));  
    
    $tpl->clearAllCache();
?>
