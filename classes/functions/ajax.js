function function(json, action) {
    $.ajaxSetup({
        cache: false,url: "ajax.php",type: "POST",datatype: "json",contentType: "application/json; charset=UTF-8",
        error: function (e) {if (e.message != "undefined" && e.message != null) {alert(e.message);}}
    });

    var InputArray = {};
    InputArray["action"] = action;

    //////////////////////////// Create Custom Order ///////////////////////////////

    if (action == "init") {
        var textVal = "";
        InputArray["textVal"] = textVal;
        $.ajax({
            data: JSON.stringify(InputArray),
            success: function (data) {

            }
        });
    }
}


