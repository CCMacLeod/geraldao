//------------------------- inicio -------------------------
//adiciona classe "clicked" para o botão clicado
$('button').on('click', function(){
    $(this).addClass('clicked');
});
//desabilita o botão de submit clicado após o primeiro clique - evitando clique duplo
$('form').submit(function(e){
    e.preventDefault(); //Stop submit
    $(document).find('.clicked').attr('disabled',true); //desabilita o botão clicado
    $(document).find('.clicked').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>'); //desabilita o botão clicado
    this.submit(); //Submit
});
//altera o botão para spinner ao ser clicado também para os botões que não são submits, mas sim links de ação. Os botões-link que tem a classe button-loading, mudam para spinner ao serem clicados.
$(document).on('click', '.button-loading', function(){
    $(this).attr('disabled',true); //desabilita o botão clicado
    $(this).addClass('disabled'); //desabilita o botão clicado
    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>'); //desabilita o botão clicado
});
//-------------------------- fim --------------------------