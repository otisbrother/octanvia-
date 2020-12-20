iFrameResize({log: true}, '#mainFrame')
//Set height for no redunant
$(document).ready(function(){
    $(".account-nav li").click(function(){
        var height = $("iframe")[0].style.height
        var height = height.substring(0, height.length - 2);
        $("#mainFrame").css("height", (height/2.5) + "px")
    })
})