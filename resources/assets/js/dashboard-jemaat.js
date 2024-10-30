"use strict";

(function () {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    const jemaatChartEl = document.querySelector("#jemaatChart");
    let jemaatChart = null;

    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Jumlah Jemaat- Bar Chart
    // --------------------------------------------------------------------

    function initializeData() {
        $.ajax({
            url: `http://localhost:8354/api/total-enter-out`,
            type: "GET",
            success: function (response) {
                const years = response.data.filter((item) => item.type == 'enter').map((item) => item.year);
                const enters = response.data.filter((item) => item.type == 'enter').map((item) => item.total);
                const outs = response.data.filter((item) => item.type == 'out').map((item) => item.total);
                const deaths = response.data.filter((item) => item.type == 'death').map((item) => item.total);
                const jemaatChartOptions = {
                    series: [
                        {
                            name: "Jemaat Masuk",
                            data: enters
                        },
                        {
                            name: "Jemaat Keluar",
                            data: outs
                        },
                        {
                            name: "Jemaat Meninggal",
                            data: deaths
                        }
                    ],
                    chart: {
                        height: 400,
                        type: "bar",
                        toolbar: { show: false },
                    },
                    colors: [config.colors.primary, config.colors.info, config.colors.danger],
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "smooth",
                        width: 1,
                        lineCap: "round",
                        colors: [cardColor],
                    },
                    legend: {
                        show: true,
                        horizontalAlign: "left",
                        position: "top",
                        markers: {
                            height: 8,
                            width: 8,
                            radius: 12,
                            offsetX: -3,
                        },
                        labels: {
                            colors: axisColor,
                        },
                        itemMargin: {
                            horizontal: 10,
                        },
                    },
                    grid: {
                        show: false,
                        borderColor: borderColor,
                        padding: {
                            top: 0,
                            bottom: -8,
                            left: 20,
                            right: 20,
                        },
                    },
                    xaxis: {
                        categories: years,
                        labels: {
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
                if (
                    typeof jemaatChartEl !== undefined &&
                    jemaatChartEl !== null
                ) {
                    let jemaatChart = new ApexCharts(
                        jemaatChartEl,
                        jemaatChartOptions
                    );
                    jemaatChart.render();
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data: ", error);
            },
        });
    }

    initializeData()
})();
