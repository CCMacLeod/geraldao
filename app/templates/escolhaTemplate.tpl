{extends file="app/templates/layout.tpl"}
{block name="body"}
    
    
    <form id="escolhaTemplate" name="escolhaTemplate" >
        <div class="card">
            <div class="card-header text-white bg-primary fw-bold">
            {block name="content-header"}
                <h1 class="mb-0">Escolha um Template para uso</h1>
            {/block}
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-3 col-xs-12">
                        <select name='template' id='template' onchange="mostrarCamposHTML(this.value)">
                            <option value=''></option>
                            {foreach from=$listaArquivos item=item key=key name=name}
                                <option value="{$item}">{$item}</option>
                            {foreachelse}
                                <option value=''></option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="templateContent">
        {$templateContent nofilter}
    </div>

    <script>
        function mostrarCamposHTML(templateName) {
            $.ajax({
                url: '{$base_url}/Geraldo/carregarTemplate',  // URL do controlador/método para carregar o template
                type: 'GET',
                data: { template: templateName },
                success: function(response) {
                    $('#templateContent').html(response);
                },
                error: function() {
                    alert('Erro ao carregar o template.');
                }
            });
        }
    </script>
{/block}