let BaseRecord = {
    search: function (value) {
        var ajaxSetting = {
            method: "get",
            url: "/home",
            data: {
                search: value,
            },
            success: function (data) {
                //console.log(data.table);
                $(".amado-pro-catagory").html(data.table);
            },
            error: function (data) {
                console.log(data.responseText);
            },
        };
        $.ajax(ajaxSetting);
    },
};
