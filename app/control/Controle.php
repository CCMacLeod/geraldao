<?php
    class Controle {
        public function requisicao($nomeControle, $acao, $params) {
            $arquivoControle = __DIR__ . '\\' . ucfirst($nomeControle) . 'Controle.php';
            if (file_exists($arquivoControle)) {
                require_once $arquivoControle;
                
                $classeControle = ucfirst($nomeControle) . 'Controle';
                if (class_exists($classeControle)) {
                    $controle = new $classeControle();

                    if (method_exists($controle, $acao)) {
                        call_user_func_array([$controle, $acao], $params);
                    } else {
                        echo "Ação '$acao' não encontrada!";
                    }
                } else {
                    echo "Classe do controlador '$classeControle' não encontrada!";
                }
            } else {
                echo "Controlador '$nomeControle' não encontrado!";
            }
        }
    }
