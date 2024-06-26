const Usuarios = {
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
}

export default Usuarios