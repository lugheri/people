<script src="<?= BASE_URL ?>assets/libs/Hightcharts/jquery-3.1.1.min.js"></script>
<script src="<?= BASE_URL ?>assets/libs/Hightcharts/highcharts.js"></script>
<script src="<?= BASE_URL ?>assets/libs/Hightcharts/modules/exporting.js"></script>




<div id="grafico_Funcoes" style="width:100%"></div>

<script>
    Highcharts.chart('grafico_Funcoes', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Funções mais procuradas'
  },
  subtitle: {
    text: ''
  },
  
  yAxis: {
    min: 0,
    title: {
      text: ''
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">Funções</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [
    <?php foreach($topFuncoes as $tf):?>
            {
            name: '<?= $this->nomeFuncao($tf['idFuncao'])?>',
            data: [<?= $tf['total']?>]

        },
    <?php endforeach;?>
   ]
});
</script>