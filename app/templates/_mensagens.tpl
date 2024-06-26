{if $mensagem.texto}
    <div class="alert alert-{$mensagem.tipo} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {$mensagem.texto}
    </div>
{/if}