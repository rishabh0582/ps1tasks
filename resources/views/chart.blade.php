<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Charts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 95%;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .charts-wrapper {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .chart-box {
            flex: 1 1 45%;
            min-width: 300px;
            height: 500px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Survey Results</h2>
    <div class="charts-wrapper">
        <div id="container-current" class="chart-box"></div>
        <div id="container-previous" class="chart-box"></div>
    </div>
</div>

<script>
    const currentData = @json($responses);
    const previousData = @json($previousResponses);

    function extractChartData(dataSet) {
        const categories = [];
        const stronglyAgree = [], agree = [], neutral = [], disagree = [], stronglyDisagree = [];

        dataSet.forEach(response => {
            categories.push(response.question);
            stronglyAgree.push(response.strongly_agree);
            agree.push(response.agree);
            neutral.push(response.neutral);
            disagree.push(response.disagree);
            stronglyDisagree.push(response.strongly_disagree);
        });

        return {
            categories,
            stronglyAgree,
            agree,
            neutral,
            disagree,
            stronglyDisagree
        };
    }

    function renderChart(containerId, titleText, dataSet) {
        const chartData = extractChartData(dataSet);

        Highcharts.chart(containerId, {
            chart: {
                type: 'bar'
            },
            title: {
                text: titleText
            },
            xAxis: {
                categories: chartData.categories,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Responses'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' responses'
            },
            series: [
                {
                    name: 'Strongly Disagree',
                    data: chartData.stronglyDisagree,
                    color: '#c0392b'
                },
                {
                    name: 'Disagree',
                    data: chartData.disagree,
                    color: '#e74c3c'
                },
                {
                    name: 'Neutral',
                    data: chartData.neutral,
                    color: '#f1c40f'
                },
                {
                    name: 'Agree',
                    data: chartData.agree,
                    color: '#2ecc71'
                },
                {
                    name: 'Strongly Agree',
                    data: chartData.stronglyAgree,
                    color: '#27ae60'
                }
            ]
        });
    }

    renderChart('container-current', 'Current Survey Results', currentData);
    renderChart('container-previous', 'Previous Survey Results', previousData);
</script>

</body>
</html>
