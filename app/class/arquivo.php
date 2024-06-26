<?php
    class arquivo {
        
        function encontrarPadroesEmODT($caminhoArquivo) {
            $arquivoZip = new ZipArchive;
        
            // Abre o arquivo ODT como um arquivo zip
            if ($arquivoZip->open($caminhoArquivo) === TRUE) {
                // Procura pelo arquivo content.xml no ODT
                $contentIndex = $arquivoZip->locateName('content.xml');
                
                if ($contentIndex !== false) {
                    // Extrai o conteúdo do arquivo content.xml do ODT
                    $xmlContent = $arquivoZip->getFromIndex($contentIndex);
                    
                    // Usa DOMDocument para carregar o XML
                    $dom = new DOMDocument();
                    $dom->loadXML($xmlContent);
                    
                    // Obtém todos os textos do documento
                    $textNodes = $dom->getElementsByTagName('text');
                    $allText = '';
                    foreach ($textNodes as $textNode) {
                        $allText .= $textNode->nodeValue;
                    }
                    
                    // Procura pelos padrões desejados no texto do documento
                    $filtro = '/\[[a-zA-Z]+\.[^\]]+\]/';
                    preg_match_all($filtro, $allText, $matches);
                    
                    // Fecha o arquivo zip
                    $arquivoZip->close();
                    
                    // Retorna os padrões encontrados
                    return $matches[0];
                } else {
                    // Se não for possível encontrar o arquivo content.xml
                    $arquivoZip->close();
                    return false;
                }
            } else {
                // Se não for possível abrir o arquivo ODT
                return false;
            }
        }
        function removerColchetes($array) {
            return array_map(function($str) {
                return trim($str, "[]"); // Remove os colchetes do início e do fim da string
            }, $array);
        }

        function mapearParametrosPorTipo($listaParametros) {

            // Inicializar o array $arrayTipoParametro
            $arrayTipoParametro = [];
        
            foreach ($listaParametros as $valor) {
                // Separar tipoParametro e nomeParametro usando explode
                list($tipoParametro, $nomeParametro) = explode('.', $valor);
            
                // Verificar se tipoParametro já é uma chave no arrayTipoParametro
                if (!isset($arrayTipoParametro[$tipoParametro])) {
                    $arrayTipoParametro[$tipoParametro] = []; // Se não for, inicializar como array
                }
            
                // Adicionar nomeParametro ao array do índice tipoParametro se ainda não estiver presente
                if (!in_array($nomeParametro, $arrayTipoParametro[$tipoParametro])) {
                    $arrayTipoParametro[$tipoParametro][] = $nomeParametro;
                }
            }
            
            return $arrayTipoParametro;
        }
        

        function mapearArquivosODT($diretorio) {
            $arquivosODT = []; // Array para armazenar os nomes dos arquivos odt
            
            // Verifica se o diretório existe e é válido
            if (is_dir($diretorio)) {
                // Busca todos os arquivos odt no diretório
                $arquivos = glob($diretorio . '/*.odt');
                
                // Itera sobre os arquivos encontrados
                foreach ($arquivos as $arquivo) {
                    // Obtém apenas o nome do arquivo, removendo o caminho do diretório
                    $nomeArquivo = basename($arquivo);
                    // Adiciona o nome do arquivo ao array
                    $arquivosODT[] = $nomeArquivo;
                }
            } else {
                // Se o diretório não existir, emite um aviso
                echo "O diretório não existe.";
            }            
            return $arquivosODT;
        }

        function gerarCamposHTML($listaPadroes) {
            $camposHTML = '';
        
            foreach($listaPadroes as $parametro => $valores) {
                foreach($valores as $valor) {
                    switch ($parametro) {
                        case 'pe':
                            // Substituir '_' por ' ' e '-' por '/'
                            $valorFormatado = str_replace('_', ' ', $valor);
                            $valorFormatado = str_replace('-', '/', $valor);
                            // Criar label e input
                            $camposHTML .= '<label for="' . $valorFormatado . '">' . $valorFormatado . '</label>';
                            $camposHTML .= '<input type="text" name="' . $valorFormatado . '" class="form-control" required><br>';
                            break;
        
                        // Adicione mais casos conforme necessário
                        // case 'outroParametro':
                        //     $camposHTML .= '<label for="...">...</label>';
                        //     $camposHTML .= '<input type="text" name="..." required><br>';
                        //     break;
        
                        default:
                            // Handle other parameters or ignore
                            break;
                    }
                }
            }        
            return $camposHTML;
        }        
    }