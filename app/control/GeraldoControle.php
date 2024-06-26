<?php
    class GeraldoControle extends Controle{
        public function index() {
            global $tpl;
            $tpl->assign('title', 'Página Inicial');            
            $tpl->display('./app/templates/layout.tpl');
        }

        public function mostrarUploadArquivo() {
            global $tpl;
            $tpl->assign('title', 'Upload de Arquivos ODT (Templates)');
            
            $tpl->display('./app/templates/uploadArquivo.tpl');
        }

        public function escolherTemplate() {
            global $tpl;
            global $extrator;
            global $diretorioArquivos;
            $listaArquivos = $extrator->mapearArquivosODT($diretorioArquivos);
            $tpl->assign('listaArquivos',$listaArquivos);
            
            $tpl->display('./app/templates/escolhaTemplate.tpl');
        }

        public function carregarTemplate() {
            global $tpl, $diretorioArquivos, $extrator;
            if (isset($_GET['template'])) {
                $nomeTemplate = $_GET['template'];
                $arquivo = $diretorioArquivos . "/" . $nomeTemplate;
                $padroes = $extrator->encontrarPadroesEmODT($arquivo);                
                $padroes = $extrator->removerColchetes($padroes);
                $listaPadroes = $extrator->mapearParametrosPorTipo($padroes);                
                
                $tpl->assign('templateContent', $extrator->gerarCamposHTML($listaPadroes));
                $tpl->assign('nomeTemplate', $nomeTemplate);
                $tpl->display('camposHTML.tpl');
            } else {
                $tpl->assign('mensagem', 
                            ['texto'=>'Template não carregado. ',
                            'tipo'=>'danger']);
            }
        }
    
        public function processarTemplate() {
            global $diretorioArquivos, $tbs, $tpl;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nomeTemplate = $_POST['template'];
                $dados = $_POST;
                unset($dados['template']);
                $arquivoODT = $diretorioArquivos . "/" . $nomeTemplate;

                $tbs->LoadTemplate($arquivoODT);
                $tbs->MergeField('pe', $dados);
                $novoArquivo = "output_" . $nomeTemplate ;
                $tbs->Show(OPENTBS_DOWNLOAD, $novoArquivo);
                $tpl->assign('mensagem', 
                            ['texto'=>'Preenchimento do arquivo realizado corretamente. ',
                            'tipo'=>'success']);
            } else {                
                $tpl->assign('mensagem', 
                            ['texto'=>'Não foi possível preencher o Template. ',
                            'tipo'=>'danger']);
            }
        }
        public function uploadArquivo() {
            global $tpl, $diretorioArquivos;
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
                $arquivoTemp = $_FILES['arquivo']['tmp_name'];
                $nomeArquivo = basename($_FILES['arquivo']['name']);
                $caminhoDestino = $diretorioArquivos .'/'. $nomeArquivo;
        
                if (move_uploaded_file($arquivoTemp, $caminhoDestino)) {
                    $tpl->assign('mensagem', 
                            ['texto'=>'Arquivo enviado com sucesso. ',
                            'tipo'=>'success']);
                    $this->mostrarUploadArquivo();
                } else {
                    $tpl->assign('mensagem', 
                            ['texto'=>'Erro ao mover o arquivo para o diretório de destino. ',
                            'tipo'=>'danger']);
                }
            } else {
                $tpl->assign('mensagem', 
                            ['texto'=>'Erro no upload do arquivo. ',
                            'tipo'=>'danger']);
            }
        }
    }
?>