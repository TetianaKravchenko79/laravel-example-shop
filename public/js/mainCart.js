$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

let BaseRecord = {
    clearone: function (id) {
        var ajaxSetting = {
            method: "post",
            url: "/clearone",
            data: {
                id: id,
            },
            success: function (data) {
                $("#pannel").html(data.table); //!!! $('# pannel ') in cart.blade + data.table
            },
            error: function (data) {
                console.log(data.responseText);

                let answerError = JSON.parse(data.responseText);
                console.log(answerError);

                alert(answerError.message);
            },
        };
        $.ajax(ajaxSetting);
    },
};
