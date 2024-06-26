{* {extends file="app/templates/layout.tpl"}
{block name="body"}
    {block name="content-header"}
        <h1 class="mb-0">Faça o upload do arquivo ODT (Template)</h1>
        <form>
            <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />

            <input type="file" />
        </form>
    {/block}
{/block} *}
{extends file="app/templates/layout.tpl"}
{block name="body"}
    
        <form action="{$base_url}/Geraldo/uploadArquivo" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header text-white bg-primary fw-bold">
                {block name="content-header"}
                    <h1 class="mb-0">Faça o upload do arquivo ODT (Template)</h1>
                {/block}
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3 col-xs-12">
                            <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
                            <input type="file" name="arquivo" required />
                        </div>                        
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 col-xs-12">
                            <button type="submit">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
{/block}
