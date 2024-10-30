
$("#year-selector").on("change", function () {
    const year = $(this).val(); // Get the value of the selected option
    $('.current-year').text(year)

    $.ajax({
        url: `http://localhost:8354/api/income-year/${year}/${'income_year'}`,
        type: "GET",
        success: function (response) {
            $('#year').text(response.nominal.toLocaleString('id-ID'))
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        },
    });

    $.ajax({
        url: `http://localhost:8354/api/income-year/${year}/${'income_youth'}`,
        type: "GET",
        success: function (response) {
            $('#youth').text(response.nominal.toLocaleString('id-ID'))
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        },
    });

    $.ajax({
        url: `http://localhost:8354/api/income-year/${year}/${'income_kid'}`,
        type: "GET",
        success: function (response) {
            $('#kid').text(response.nominal.toLocaleString('id-ID'))
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        },
    });

    $.ajax({
        url: `http://localhost:8354/api/income-year/${year}/${'income_routine'}`,
        type: "GET",
        success: function (response) {
            $('#routine').text(response.nominal.toLocaleString('id-ID'))
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        },
    });

});
