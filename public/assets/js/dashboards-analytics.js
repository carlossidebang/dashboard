/**
 * Dashboard Analytics
 */

"use strict";

(function () {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    let totalRevenueChartEl = document.querySelector("#totalRevenueChart");
    let totalRevenueChart = null;

    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Total Revenue Report Chart - Bar Chart
    // --------------------------------------------------------------------

    function initializeData() {
        $.ajax({
            url: `http://localhost:8354/api/income-outcome`,
            type: "GET",
            success: function (response) {
                // Assume response is an array of objects { date: "2021-01-01", value: 10 }
                const income = response
                    .filter(
                        (item) => item.type === "income" && item.total_nominal
                    )
                    .map((income) => income.total_nominal);

                const outcome = response
                    .filter(
                        (item) => item.type === "outcome" && item.total_nominal
                    )
                    .map((outcome) => outcome.total_nominal);
                const tempYears = response.map((item) => item.year);
                
                const years = [...new Set(tempYears)];

                const totalRevenueChartOptions = {
                    series: [
                        {
                            name: "Pemasukkan",
                            data: income,
                        },
                        {
                            name: "Pengeluaran",
                            data: outcome,
                        },
                    ],
                    chart: {
                        height: 300,
                        toolbar: {
                            show: false,
                        },
                        type: "area",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 2,
                        curve: "smooth",
                    },
                    legend: {
                        horizontalAlign: "left",
                        position: "top",
                        show: true,
                    },
                    colors: [config.colors.primary, config.colors.secondary],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: shadeColor,
                            shadeIntensity: 0.6,
                            opacityFrom: 0.5,
                            opacityTo: 0.25,
                            stops: [0, 95, 100],
                        },
                    },
                    grid: {
                        borderColor: borderColor,
                        strokeDashArray: 3,
                        padding: {
                            top: -10,
                            bottom: -8,
                            // left: -10,
                            right: 8,
                        },
                    },
                    xaxis: {
                        categories: years,
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            show: true,
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            show: true,
                        },
                        tickAmount: 4,
                    },
                };
                if (
                    typeof totalRevenueChartEl !== undefined &&
                    totalRevenueChartEl !== null
                ) {
                    totalRevenueChart = new ApexCharts(
                        totalRevenueChartEl,
                        totalRevenueChartOptions
                    );
                    totalRevenueChart.render();
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data: ", error);
            },
        });
    }

    initializeData();
})();
