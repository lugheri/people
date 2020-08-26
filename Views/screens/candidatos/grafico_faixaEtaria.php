<script src="<?= BASE_URL ?>assets/libs/Hightcharts/jquery-3.1.1.min.js"></script>
<script src="<?= BASE_URL ?>assets/libs/Hightcharts/highcharts.js"></script>
<script src="<?= BASE_URL ?>assets/libs/Hightcharts/modules/exporting.js"></script>




<div id="grafico_faixaEtaria" style="width:100%"></div>

<script>
    Highcharts.chart('grafico_faixaEtaria', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Faixa Etária'
    },
   
    xAxis: {
        categories: ['Menor de 18', 'De 20 a 29', 'De 30 a 39', 'De 40 a 49', 'Maior de 50'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: '',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Faixa Etária',
        data: [
                <?= $this->faixaIdade(date('Y')-18,null)?>,
                <?= $this->faixaIdade(date('Y')-29,date('Y')-20)?>,
                <?= $this->faixaIdade(date('Y')-39,date('Y')-30)?>,
                <?= $this->faixaIdade(date('Y')-49,date('Y')-40)?>,
                <?= $this->faixaIdade(null,date('Y')-50)?>
              ]
    }]
});
</script>