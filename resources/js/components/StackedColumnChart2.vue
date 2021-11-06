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
    
    methods: {
        fetchData() {
            console.log("inside fetchData...");
            let self = this;
            axios.get(this.url).then(response => {
                self.results = response.data;
                // self.results = response.data;
                // console.log(response.data);
                // console.log(data);
                // console.log(this.results.title);

                const number = self.results.data.length;
                // const number = response.data.data.length;
                // const number = 3;
                // console.log(number);
                // let seriesTemp = [];

                for(let i=0; i<number; i++){
                self.series.push({
                    name: response.data.data[i].name,
                    data: response.data.data[i].data,
                }); // end push
                } // end for

                // console.log(seriesTemp);
                // this.series = seriesTemp;
                // self.results = response.data;
                // this.series = seriesTemp;
            }); // end axios
        } // end fetchData
    }, // end methods

    mounted() {
      console.log("stacked column chart 2 mounted");
    //   console.log(this.url);
      let self = this;
      self.fetchData();

    //   let self = this;

    console.log('why is this undefined???');
    console.log(this.results);
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

Highcharts.chart(this.$el, {

    title: {
        text: this.results.title
    },

    subtitle: {
        text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
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

    series: [{
        name: 'Installation',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }],

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

    // Highcharts.chart(this.$el, chartOptions); // end chart
    } // end mounted 
  } // end export default
</script>