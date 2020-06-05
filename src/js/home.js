//========================================HOME========================================//

//====================GLOBAL VARIABLES====================//
//====================GLOBAL VARIABLES====================//

//====================GENERAL====================//
$(function () {
    $(document).on("click", "#logout-button", function (e) {
        $.ajax({
            url: "./app/Controllers/RequestsController",
            type: "POST",
            dataType: "text",
            data: {
                read: "logoutUser"
            }
        }).done(function (data) {
            location.reload();
        }).fail(function (data) {
            window.location.replace("home");
        });
    });
});
//====================GENERAL====================//