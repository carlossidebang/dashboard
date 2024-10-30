"use strict";

(function () {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    let outcomeChartEl = document.querySelector("#outcomeChart");
    let outcomeChart = null;

    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Jumlah Jemaat- Bar Chart
    // --------------------------------------------------------------------

    function initializeData() {
        $.ajax({
            url: `http://localhost:8354/api/outcome?start_date=2018-01-01&end_date=2018-12-31`,
            type: "GET",
            success: function (response) {
                // Assume response is an array of objects { date: "2021-01-01", value: 10 }
                const values = response.data.map((item) => item.total_outcome);
                const outcomeChartOptions = {
                    series: [
                        {
                            name: 2018,
                            data: values,
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
                    colors: [config.colors.primary],
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
                        categories: [
                            "Januari",
                            "Februari",
                            "Maret",
                            "April",
                            "Mei",
                            "Juni",
                            "Juli",
                            "Agustus",
                            "September",
                            "Oktober",
                            "November",
                            "Desember",
                        ],
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
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                };
                if (
                    typeof outcomeChartEl !== undefined &&
                    outcomeChartEl !== null
                ) {
                    outcomeChart = new ApexCharts(
                        outcomeChartEl,
                        outcomeChartOptions
                    );
                    outcomeChart.render();
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data: ", error);
            },
        });
    }

    $("#year-selector").on("change", function () {
        const year = $(this).val(); // Get the value of the selected option
        // Fetch data from the API using AJAX
        $.ajax({
            url: `http://localhost:8354/api/outcome?start_date=${year}-01-01&end_date=${year}-12-31`,
            type: "GET",
            success: function (response) {
                let values = response.data.map((item) => item.total_outcome);
                outcomeChart.updateSeries([
                    {
                        name: year,
                        data: values,
                    },
                ]);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data: ", error);
            },
        });
    });

    initializeData();
})();
