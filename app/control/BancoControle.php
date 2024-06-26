<?php
    class BancoControle extends Controle{
        public function recuperarDadosServidor() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {
                $codigo = $_POST['codigo'];
                $dadosServidor = $this->banco->recuperarDadosServidor($codigo);
                $this->carregarView('montaCampos', ['dadosServidor' => $dadosServidor]);
            } else {
                $this->carregarView('montaCampos');
            }
        }
    }