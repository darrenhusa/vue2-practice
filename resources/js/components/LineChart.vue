<template>
  <div></div>
</template>

<script>
  import Highcharts from 'highcharts';
  import Exporting from 'highcharts/modules/exporting';
  Exporting(Highcharts);

  export default {
    name: 'LineChart',
    props: {
       series : {
        type: Object,
        required: true
      },
    },
    
    data() {
      return { 
        // target: 'container',
        // target: undefined,
      }
    },

    mounted() {
      console.log('inside line chart mounted');
      const seriesTemp = [];
      const number = this.series.data.length
      
      for(let i=0; i<number; i++){
        seriesTemp.push({

            name: this.series.data[i].label,
            data: this.series.data[i].value,
 
            // name: this.series.data[i].label,
            // data: this.series.data[i].values,
            // color: this.series.data[i].color
        });
      }
      console.log(seriesTemp);

      Highcharts.chart(this.$el, {

    title: {
      text: this.series.title
    },

    subtitle: {
      text: this.series.subtitle
    },

    yAxis: {
      title: {
        text: this.series.y_axis
      }
    },

    xAxis: {
      accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
      }
    },

    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },

    plotOptions: {
      series: {
        label: {
          connectorAllowed: false
        },
        pointStart: 2010
      }
    },

    series: seriesTemp,

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }
  });

}
  }
</script>