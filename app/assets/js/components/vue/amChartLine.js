export default {
    name: "am-chart-line",
    props: {
        'chartdata': {
            required: true
        },
        'series': {
            type: Number,
            default: 2,
            required: false
        }
    },
    template: `
                <div id="amchart-linetop" ref="amchart-linetop"></div>
            `,
    methods:{
        prepareData(){
            let chartData = []

            if(this.chartdata){
                const qtDays = this.chartdata[0].data.length
                const groupSerie = parseInt(this.series / 2)
                let arrAux = []

                for(let i=0; i<qtDays; i++){
                    for(let j=0; j<groupSerie; j++){
                        arrAux[`atividade_${j}`] = this.chartdata[j].data[i].qt_atividade
                        arrAux[`peso_${j}`] = this.chartdata[j].data[i].qt_peso
                    }
                    const objAux = Object.assign({}, arrAux)
                    chartData.push({
                        date: new Date(this.chartdata[0].data[i].date),
                        ...objAux
                    })
                }
            }

            return chartData
        }
    },
    mounted() {
        am4core.useTheme(am4themes_animated)
        let chart = am4core.create("amchart-linetop", am4charts.XYChart)
        chart.data = this.prepareData() // Add data
        let dateAxis = chart.xAxes.push(new am4charts.DateAxis())
        dateAxis.renderer.minGridDistance = 50
        let valueAxis = chart.yAxes.push(new am4charts.ValueAxis())

        let colors = ['#7986cb', '#9fa8da', '#689f38', '#8bc34a']
        let chartSeries = []
        for(let i=0; i < this.series; i++){
            const groupSerie = parseInt(i/2)
            chartSeries[i] = chart.series.push(new am4charts.LineSeries())
            chartSeries[i].dataFields.valueY = ((i%2 === 0) ? `atividade_${groupSerie}` : `peso_${groupSerie}`)
            chartSeries[i].dataFields.dateX = "date"
            chartSeries[i].strokeWidth = 2
            chartSeries[i].stroke = am4core.color(colors[i]) //am4core.color("#7986cb")
            chartSeries[i].minBulletDistance = 10
            chartSeries[i].tooltipText = "{valueY}"
            chartSeries[i].tooltip.pointerOrientation = "vertical"
            chartSeries[i].tooltip.background.cornerRadius = 10
            chartSeries[i].tooltip.background.fillOpacity = 0.5
            chartSeries[i].tooltip.getFillFromObject = false
            chartSeries[i].tooltip.background.fill = am4core.color(colors[i]) //am4core.color("#7986cb")
            chartSeries[i].tooltip.label.padding(12,12,12,12)
            chartSeries[i].name = ((i%2 === 0) ? "Atividades" : "Pesos")

            let segment = chartSeries[i].segments.template
            segment.interactionsEnabled = true
            let hoverState = segment.states.create("hover")
            hoverState.properties.strokeWidth = 3
            let dimmed = segment.states.create("dimmed")
            dimmed.properties.stroke = am4core.color("#dadada")
            segment.events.on("over", function(event) {
                processOver(event.target.parent.parent.parent)
            })
            segment.events.on("out", function(event) {
                processOut(event.target.parent.parent.parent)
            })
        }

        chart.scrollbarX = new am4charts.XYChartScrollbar() // Add scrollbar
        for(let i=0; i < this.series; i++) {
            chart.scrollbarX.series.push(chartSeries[i])
        }

        chart.cursor = new am4charts.XYCursor() // Add cursor
        chart.cursor.xAxis = dateAxis

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
    }
}