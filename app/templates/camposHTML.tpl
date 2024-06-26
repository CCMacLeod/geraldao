{* {block name="bodyCamposHTML"}
    <h3>Preencha o Template</h3>
    
    {foreach name=outer item=content from=$templateContent key=chaveExterna}
        {foreach key=key item=item from=$content}
          {$chaveExterna}: {$item}<br>
        {/foreach}
    {/foreach}
{/block}
{block name="body"}
    {if $templateContent != ''}
        {block name="content-header"}
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Preencha os Campos do Template</h3>
                </div>
            </div>
            <div class="card-body">
                {$templateContent nofilter}
            </div>
        {/block}
    {else}
        <div class="card card-secondary card-outline">
            <div class="card-header">
                <h3 class="card-title">Template escolhido não possui campos compatíveis.</h3>
            </div>
        </div>
    {/if}
{/block} 
{block name="body"}
    <form action="{$base_url}/Geraldo/processarTemplate" method="post">
        {if $templateContent != ''}
            {block name="content-header"}
                <div class="card card-secondary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Preencha os Campos do Template</h3>
                    </div>
                </div>
                <div class="card-body">
                    {$templateContent nofilter}
                    <input type="hidden" name="template" value="{$nomeTemplate}">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            {/block}
        {else}
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Template escolhido não possui campos compatíveis.</h3>
                </div>
            </div>
        {/if}
    </form>
{/block}*}
{block name="body"}
    <form action="{$base_url}/Geraldo/processarTemplate" method="post">
        {if $templateContent != ''}
            {block name="content-header"}
                <div class="card card-secondary card-outline">
                    <div class="card-header text-white bg-primary fw-bold">
                        <h3 class="card-title">Preencha os Campos do Template</h3>
                    </div>
                
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-3 col-xs-12">
                                {$templateContent nofilter}
                                <input type="hidden" name="template" value="{$nomeTemplate}">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                {if isset($dadosServidor)}
                    <h2>Dados do Servidor</h2>
                    <ul>
                        <li>Código: {$dadosServidor.codigo}</li>
                        <li>Nome: {$dadosServidor.servidor_nome}</li>
                        <li>Situação Funcional: {$dadosServidor.sit_func}</li>
                        <li>Setor: {$dadosServidor.setor}</li>
                        <li>Função Comissionada: {$dadosServidor.func_comis}</li>
                        <li>Cargo: {$dadosServidor.cargo}</li>
                        <li>CPF: {$dadosServidor.cpf}</li>
                        <li>RG: {$dadosServidor.rg}</li>
                        <li>Classe: {$dadosServidor.classe}</li>
                        <li>Padrão: {$dadosServidor.padrao}</li>
                        <li>Data de Exercício: {$dadosServidor.dt_exerc}</li>
                    </ul>
                {/if}
            {/block}
        {else}
            <div class="card">
                <div class="card-header text-white bg-primary fw-bold">
                    
                    <h3 class="card-title">Template escolhido não possui campos compatíveis.</h3>
                </div>
            </div>
        {/if}
    </form>
{/block}
