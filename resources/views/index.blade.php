<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test page</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <h1>Hello INAIR!</h1>

    <div id="app">
      <example-component></example-component>
      <!-- <example-component /> -->
    
      @php
        $data1 = [[
            'label' => 'Installation',
            'value' => [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]],
            [
            'label' => 'Manufacturing',
            'value' => [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]]
            ];  
            
            /*  {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
            }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
            }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
            } */
       

        $series1 = [
            'title' => 'Solar Employment Growth by Sector, 2010-2016',
            'subtitle' => 'Source: thesolarfoundation.com',
            'y_axis' => 'Number of Employees',

            'data' => $data1, 
        ];

      @endphp


      <h2>Line Chart</h2>
        <!-- see https://laravel.com/docs/8.x/blade 
            use the laravel blade @json directive instead of json_encode()
        -->
        <!-- 
            https://www.geeksforgeeks.org/php-json_encode-function/
            The json_encode() function is an inbuilt function in PHP which is used to convert PHP array or object into JSON representation.
         -->
        <line-chart v-bind:series='@json($series1)'></line-chart>
        <!-- <line-chart></line-chart> -->
    
        <h2>Stacked Column Chart</h2>
        <stacked-column-chart></stacked-column-chart>

    </div>



    <!-- <figure class="highcharts-figure"> -->
        <!-- <line-chart options="title1, data1, y-axis1"></line-chart>  -->
        <!-- <line-chart options="title2, data2, y-axis2"></line-chart>  -->
    <!-- <div id="container"></div> -->
    <!-- <p class="highcharts-description">
        Basic line chart showing trends in a dataset. This chart includes the
        <code>series-label</code> module, which adds a label to each line for
        enhanced readability.
    </p> -->
    <!-- </figure> -->

    <h2>Bar Chart</h2>
    <div id="container2"></div>
    

<script>
Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Historic World Population by Region'
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    },
    xAxis: {
        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }, {
        name: 'Year 1900',
        data: [133, 156, 947, 408, 6]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 727, 31]
    }, {
        name: 'Year 2016',
        data: [1216, 1001, 4436, 738, 40]
    }]
});
              
</script>
</body>
</html>