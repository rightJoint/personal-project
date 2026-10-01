$(document).ready(function() {
    $(".art-dialog span.show-dialog").click(function () {
        if ($(this).hasClass("active")) {
            $(this).parent().find("ul").slideUp("slow");
            $(this).removeClass("active");
        } else {
            $(this).parent().find("ul").slideDown("slow");
            $(this).addClass("active")
        }
    })
});