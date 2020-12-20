//show filter in newsest-room.html
$(document).ready(function(){
    $(".showBtn").click(function(){
        
        var x = $(this).css("transform");
        var deg90 = "matrix(6.12323e-17, -1, 1, 6.12323e-17, 0, 0)";
        // rotate the button
        if(x != deg90){
            $(this).css({"transform":deg90})
        }
        else{
            $(this).css({"transform":"rotate(0deg)"})
        }
        $(this).parent().siblings(".item").slideToggle();
    })
})