<template>
  <div></div>
</template>

<script>
    import Highcharts from 'highcharts';
    import Exporting from 'highcharts/modules/exporting';
// import func from 'vue-editor-bridge';
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
          chartOptions: {}
      }
    },

    created() {
    //   console.log("stacked column chart 2 created");
    
      this.fetchData();
    },

    methods: {
        async fetchData() 
        {
            try {
              const response = await axios.get(this.url);
              this.results = response.data;
  
              this.mapChartData(this);      
              this.setChartOptions(this);

              Highcharts.chart(this.$el, this.chartOptions); // end chart
            }
            catch(e) {
                console.log('error!!!!')
                console.error(e)
            }
        
        }, // end fetchData

        mapChartData(self) {
            const number = self.results.data.length;
            console.log(number);
            
            for(let i=0; i<number; i++)
            {
                self.series.push({
                    name: self.results.data[i].name,
                    data: self.results.data[i].data,
                }); // end push
            } // end for
        }, // end mapChartData

        setChartOptions(self) {
            self.chartOptions = {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: self.results.title
                    },
                    xAxis: {
                        categories: self.results.categories
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: self.results.y_axis
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
                    series: self.series,
                };
            
        }, // end setCartOptions
    
    }, // end methods
 
  } // end export default
</script>