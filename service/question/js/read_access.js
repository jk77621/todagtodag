
$("#close").on("click", function () {

    popup_close();
    
})

function popup_open() {
    $("body").css("overflow", "hidden");
    $("body").append("<div id='backgroundSmsLayer'></div>");
    $("#backgroundSmsLayer").css({
        "position"        : "fixed",
        "top"             : "0px",
        "left"            : "0px",
        "width"           : "100%",
        "height"          : "100%",
        "background-color": "#000",
        "z-index"         : "-1",
        "opacity"         : "0.3"

    });

    $("input[type=radio]").prop("checked", false);
    $("#popup").fadeIn();
}

function popup_close() {
    $("#star_grade").children("span").removeClass("on");

    // $content.find("textarea").val("");

    $("body").css("overflow", "auto");
    $("#backgroundSmsLayer").remove();
    $("#popup").fadeOut();
}
