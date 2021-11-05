<template>
  <div></div>
</template>

<script>
    import Highcharts from 'highcharts';
    import Exporting from 'highcharts/modules/exporting';
    Exporting(Highcharts);

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
      console.log("stacked column chart 2 mounted");
    //   console.log(this.url);
    
    //   let self = this;

      axios.get(this.url).then(response => {
            this.results = response.data;
            // self.results = response.data;
            // console.log(response.data);
            // console.log(data);
            // console.log(this.results.title);

            const number = this.results.data.length;
            // const number = response.data.data.length;
            // const number = 3;
            // console.log(number);
            // let seriesTemp = [];

            for(let i=0; i<number; i++){
              this.series.push({
                  name: response.data.data[i].name,
                  data: response.data.data[i].data,
              }); // end push
            } // end for

            // console.log(seriesTemp);
            // this.series = seriesTemp;
            // self.results = response.data;
            // this.series = seriesTemp;
      }); // end axios

    console.log('why is this undefined???');
    console.log(this.results.title);

    const chartOptions = {
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
        series: this.series,
    };

    Highcharts.chart(this.$el, chartOptions); // end chart
    } // end mounted 
  } // end export default
</script>