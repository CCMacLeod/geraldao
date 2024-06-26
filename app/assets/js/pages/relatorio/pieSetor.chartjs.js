$(document).ready(function(){
    let _id_setor = $('#setor-id').attr('data-value')
    let _data_inicio = $('#data-inicio').attr('data-value')
    let _data_fim = $('#data-fim').attr('data-value')
    let donutChartCanvasAtividades = $('#donut-atividades-chartjs').get(0).getContext('2d')
    let donutChartCanvasPesos = $('#donut-pesos-chartjs').get(0).getContext('2d')
    let _labels = []
    let _data_atividades = []
    let _data_pesos = []
    let _backgroundColor = []
    let _donutDataAtividades = [];
    let _donutDataPesos = [];

    jQuery.ajax({
        url: `api/setor/atividades/${_id_setor}/${_data_inicio}/${_data_fim}/agregados`,
        success: function (valoresAgregados) {
            valoresAgregados.atividades_sistema.forEach(function(atividade_sistema){
                let _randomColor = randomHSLColor()
                _labels.push(atividade_sistema.key)
                _data_atividades.push(atividade_sistema.doc_count)
                _backgroundColor.push(_randomColor)
            })

            valoresAgregados.pesos_sistema.forEach(function(atividade_peso) {
                _data_pesos.push(atividade_peso._sum_pesos_sistema.value)
            })
        },
        async: false
    })

    let _donutOptions = {
        maintainAspectRatio : false,
        responsive : true,
    }

    _donutDataAtividades = {
        labels: _labels,
        datasets: [
            {
                data: _data_atividades,
                backgroundColor: _backgroundColor
            }
        ]
    }

    _donutDataPesos = {
        labels: _labels,
        datasets: [
            {
                data: _data_pesos,
                backgroundColor: _backgroundColor
            }
        ]
    }

    var donutChartAtividade = new Chart(donutChartCanvasAtividades, {
        type: 'doughnut',
        data: _donutDataAtividades,
        options: _donutOptions
    })

    var donutChartPesos = new Chart(donutChartCanvasPesos, {
        type: 'doughnut',
        data: _donutDataPesos,
        options: _donutOptions
    })

    function randomHSLColor(){
        return "hsla(" + ~~(360 * Math.random()) + "," +
            "70%,"+
            "80%,1)"
    }
})