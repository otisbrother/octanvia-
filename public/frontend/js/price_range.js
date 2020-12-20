// show price range
$("document").ready(function() {
    $("#price").mousemove(function() {
        $("#pr-value").html($("#price").val());
    })
})