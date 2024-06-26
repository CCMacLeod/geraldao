const Setores = {
    language: 'pt-BR',
    minimumInputLength: 4,
    ajax: {
        url: "/api/buscar/setor",
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
}

export default Setores