const el = $('#usuario-search')
el.select2({
    language: 'pt-BR',
    minimumInputLength: 3,
    ajax: {
        url: "/api/buscar/usuario",
        dataType: 'json',
        type: "GET",
        data: (params) => {
           return {
                text: params.term,
                page: params.page || 1
            }
        },
        processResults: (data) => {
            return {
                results: $.map(data, (item) => {
                    return {
                        text: item.DESCRICAO,
                        id: item.ID
                    }
                })
            };
        },
    }
});
el.on('select2:select', function (e) {
    $('#loading').fadeIn()
    window.location.replace(`/relatorio/usuario/${e.params.data.id}`)
});