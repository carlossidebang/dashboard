'use strict';

(function () {

    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Jumlah Jemaat- Bar Chart
    // --------------------------------------------------------------------
    const jemaatPindahChartEl = document.querySelector('#jemaatPindahChart'),
        jemaatPindahChartOptions = {
            series: [
                {
                    name: 'Pria',
                    data: [29, 18, 12]
                },
                {
                    name: 'Wanita',
                    data: [5, 3, 2]
                }
            ],
            chart: {
                height: 400,
                type: 'bar',
                toolbar: { show: false }
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                horizontalAlign: 'left',
                position: 'top',
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3
                },
                labels: {
                    colors: axisColor
                },
                itemMargin: {
                    horizontal: 10
                }
            },
            grid: {
                show: false,
                borderColor: borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20
                }
            },
            xaxis: {
                categories: [2021, 2022, 2023],
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                },
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '13px',
                        colors: axisColor
                    }
                }
            },
        };
    if (typeof jemaatPindahChartEl !== undefined && jemaatPindahChartEl !== null) {
        const jemaatPindahChart = new ApexCharts(jemaatPindahChartEl, jemaatPindahChartOptions);
        jemaatPindahChart.render();
    }
})()