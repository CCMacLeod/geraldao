$(document).ready(function(){
    const queryFilter = $('#queryFilter').attr('data-query')
    console.log(queryFilter)

// Themes begin
    am4core.useTheme(am4themes_animated)
// Themes end

// Create chart instance
    var chart = am4core.create("amchart-linetop", am4charts.XYChart)

// Add data
    chart.data = generateChartData()

// Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis())
    dateAxis.renderer.minGridDistance = 50

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis())

// ========================================================================================================
// Create series
// ========================================================================================================
    var atividades = chart.series.push(new am4charts.LineSeries())
    atividades.dataFields.valueY = "atividades"
    atividades.dataFields.dateX = "date"
    atividades.strokeWidth = 2
    atividades.stroke = am4core.color("#7986cb")
    atividades.minBulletDistance = 10
    atividades.tooltipText = "{valueY}"
    atividades.tooltip.pointerOrientation = "vertical"
    atividades.tooltip.background.cornerRadius = 10
    atividades.tooltip.background.fillOpacity = 0.5
    atividades.tooltip.getFillFromObject = false
    atividades.tooltip.background.fill = am4core.color("#7986cb")
    atividades.tooltip.label.padding(12,12,12,12)
    atividades.name = "Atividades"

    var segmentAtividades = atividades.segments.template
    segmentAtividades.interactionsEnabled = true
    var hoverStateAtividades = segmentAtividades.states.create("hover")
    hoverStateAtividades.properties.strokeWidth = 3
    var dimmedAtividades = segmentAtividades.states.create("dimmed")
    dimmedAtividades.properties.stroke = am4core.color("#dadada")
    segmentAtividades.events.on("over", function(event) {
        processOver(event.target.parent.parent.parent)
    })
    segmentAtividades.events.on("out", function(event) {
        processOut(event.target.parent.parent.parent)
    })

// ========================================================================================================
// Create series
// ========================================================================================================
    var pontos = chart.series.push(new am4charts.LineSeries())
    pontos.dataFields.valueY = "pontos"
    pontos.dataFields.dateX = "date"
    pontos.strokeWidth = 2
    pontos.stroke = am4core.color("#689f38")
    pontos.minBulletDistance = 10
    pontos.tooltipText = "{valueY}"
    pontos.tooltip.pointerOrientation = "vertical"
    pontos.tooltip.background.cornerRadius = 10
    pontos.tooltip.background.fillOpacity = 0.5
    pontos.tooltip.getFillFromObject = false
    pontos.tooltip.background.fill = am4core.color("#689f38")
    pontos.tooltip.label.padding(12,12,12,12)
    pontos.name = "Pontos"

    var segmentPontos = pontos.segments.template
    segmentPontos.interactionsEnabled = true
    var hoverStatePontos = segmentPontos.states.create("hover")
    hoverStatePontos.properties.strokeWidth = 3
    var dimmedPontos = segmentPontos.states.create("dimmed")
    dimmedPontos.properties.stroke = am4core.color("#dadada")
    segmentPontos.events.on("over", function(event) {
        processOver(event.target.parent.parent.parent)
    })
    segmentPontos.events.on("out", function(event) {
        processOut(event.target.parent.parent.parent)
    })
// ========================================================================================================

// Add scrollbar
    chart.scrollbarX = new am4charts.XYChartScrollbar()
    chart.scrollbarX.series.push(atividades)
    chart.scrollbarX.series.push(pontos)

// Add cursor
    chart.cursor = new am4charts.XYCursor()
    chart.cursor.xAxis = dateAxis
//chart.cursor.snapToSeries = atividades
//chart.cursor.snapToSeries = pontos

    chart.legend = new am4charts.Legend()
    chart.legend.position = "right"
    chart.legend.scrollable = true

    chart.legend.markers.template.states.create("dimmed").properties.opacity = 0.3
    chart.legend.labels.template.states.create("dimmed").properties.opacity = 0.3

    chart.legend.itemContainers.template.events.on("over", function(event) {
        processOver(event.target.dataItem.dataContext)
    })

    chart.legend.itemContainers.template.events.on("out", function(event) {
        processOut(event.target.dataItem.dataContext)
    })

// ========================================================================================================
// functions
// ========================================================================================================
    function generateChartData() {
        let _id_usuario = $('#usuario-id').attr('data-value')
        let _data_inicio = $('#data-inicio').attr('data-value')
        let _data_fim = $('#data-fim').attr('data-value')
        var chartData = []
        let c = 0
        let p = 0
        jQuery.ajax({
            url: `/api/usuario/atividades/${_id_usuario}/${_data_inicio}/${_data_fim}/count/dia${queryFilter}`,
            success: function (atividadesHora) {
                atividadesHora.forEach(function(groupAtividade){
                    var _date = new Date(groupAtividade.key)
                    let _countAtividades = groupAtividade.doc_count
                    let _sumPontos = groupAtividade._pesos_por_hora.value
                    c += _countAtividades
                    p += _sumPontos
                    chartData.push({
                        date: _date,
                        atividades: _countAtividades,
                        pontos: _sumPontos
                    })
                })
            },
            async: false
        })
        return chartData
    }

    function processOver(hoveredSeries) {
        hoveredSeries.toFront()

        hoveredSeries.segments.each(function(segment) {
            segment.setState("hover")
        })

        hoveredSeries.legendDataItem.marker.setState("default")
        hoveredSeries.legendDataItem.label.setState("default")

        chart.series.each(function(series) {
            if (series != hoveredSeries) {
                series.segments.each(function(segment) {
                    segment.setState("dimmed")
                })
                series.bulletsContainer.setState("dimmed")
                series.legendDataItem.marker.setState("dimmed")
                series.legendDataItem.label.setState("dimmed")
            }
        })
    }

    function processOut() {
        chart.series.each(function(series) {
            series.segments.each(function(segment) {
                segment.setState("default")
            })
            series.bulletsContainer.setState("default")
            series.legendDataItem.marker.setState("default")
            series.legendDataItem.label.setState("default")
        })
    }
})