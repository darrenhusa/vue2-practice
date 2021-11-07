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
  
              const number = response.data.data.length;

                for(let i=0; i<number; i++)
                {
                    this.series.push({
                        name: response.data.data[i].name,
                        data: response.data.data[i].data,
                    }); // end push
                } // end for

                // set chart options
                this.chartOptions = {
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
            
                Highcharts.chart(this.$el, this.chartOptions); // end chart
            }
            catch(e) {
                console.log('error!!!!')
                console.error(e)
            }
        
        }, // end fetchData
    
    }, // end methods
 
  } // end export default
</script>