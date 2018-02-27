<script type="text/javascript">

function loadLineChart(data) {
    var ctx = document.getElementById('lineChartCanvas').getContext('2d');
    window.myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            tooltips: {
                mode: 'x-axis',
                titleFontSize: 15,
                titleMarginBottom: 12,
                bodyFontSize: 15,
                bodySpacing: 10,
                callbacks: {
                    title: function(item) {
                        return moment(item[0].xLabel).format("{{ $account->getMomentDateFormat() }}");
                    },
                    label: function(item, data) {
                        //return label + formatMoney(item.yLabel, chartCurrencyId, account.country_id);
                        /*
                        console.log('tooltip:');
                        console.log(item);
                        console.log(data);
                        */
                        return item.yLabel;
                    }
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: "{{ $report->chartGroupBy() }}",
                        round: "{{ $report->chartGroupBy() }}",
                    },
                    gridLines: {
                        display: false,
                    },
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(label, index, labels) {
                            return roundSignificant(label);
                        }
                    },
                }]
            }
        }
    });
}

$(function() {
    var lineChartData = {!! json_encode($report->getLineChartData()) !!};
    //console.log(chartData);
    loadLineChart(lineChartData);
});

</script>

<div class="row">
    <div class="col-md-12">
        <canvas id="lineChartCanvas" style="background-color:white; padding:20px; width:100%; height: 250px;"></canvas>
    </div>
</div>

<p>&nbsp;</p>
