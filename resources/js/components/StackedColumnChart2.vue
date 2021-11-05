<template>
  <div></div>
</template>

<script>
  export default {
    name: 'StackedColumnChart2',
    props: {
        url : {
            type: String,
            required: true
        },
    },

    data() {
      return {
          results: [],
          series: [],
      }
    },
    
    mounted() {
    //   console.log("stacked column chart mounted");
    //   console.log(this.url);
    
      axios.get(this.url).then(function(response) {
            // this.results = response.data;
            console.log(response.data);
            // console.log(data);
            // console.log(this.results.title);

            // const number = this.results.length;
            const number = 2;
            // console.log(number);
            let seriesTemp = [];

            for(let i=0; i<number; i++){
              seriesTemp.push({
                  name: this.results.data[i].label,
                  data: this.results.data[i].values,
                  color: this.results.data[i].color
              }); // end push
            } // end for

            this.series = seriesTemp;
            // console.log(seriesTemp);
      });

    Highcharts.chart(this.$el, {
    chart: {
        type: 'column'
    },
    title: {
        text: this.results.title
    },
    xAxis: {
        categories: this.results.categories
    },
    yAxis: {
        min: 0,
        title: {
            text: this.results.y_axis
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
    legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    series: series,
    });
    }
  };
</script>