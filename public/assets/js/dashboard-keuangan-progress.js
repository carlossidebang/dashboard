$("#year-selector").on("change", function () {
    const year = $(this).val(); // Get the value of the selected option
    $('.current-year').text(year)

    $.ajax({
        url: `http://localhost:8354/api/income-year/${year}/${'income_year'}`,
        type: "GET",
        success: function (response) {
            let total = parseInt(response.nominal)
            let percentage = (total / 200000000) * 100
            let finalValue = Math.min(percentage, 100).toFixed(1)

            $('#progress').empty().append(`<div class="progress-bar ${finalValue > 75 ? 'bg-success' : finalValue < 25 ? 'bg-danger' : 'bg-warning'}" role="progressbar" style="width: ${finalValue}%;" aria-valuenow="${finalValue}" aria-valuemin="0" aria-valuemax="100">${finalValue}%</div>`)
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        },
    });

});
