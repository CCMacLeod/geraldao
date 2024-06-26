<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$title|default:"Geraldão"}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{$base_url}/app/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{$base_url}/app/assets/css/adminlte.min.css">
    </head>

    {* <body class="layout-top-nav"> *}
    <body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
        <div class="wrapper">
            {include file="app/templates/nav.tpl"}
            {include file="app/templates/sidenav.tpl"}
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            {block name="content-header"}
                            {/block}
                        </div>
                    </div>
                </section>

                <div class="content">
                    <div class="container">
                        {include file="app/templates/_mensagens.tpl"}
                        {block name="body"}
                        {/block}
                    </div>
                </div>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Versão</b> 1.0.0
                </div>
                <strong><a href="http://www.trt14.jus.br">Tribunal Regional do Trabalho 14ª Região</a> | 2022</strong>
            </footer>
        </div>
    </body>

   

    <script src="{$base_url}/app/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{$base_url}/app/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{$base_url}/app/assets/js/adminlte.min.js?v=3.2.0"></script>

</html>