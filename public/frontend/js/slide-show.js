//active slide show
$(document).ready(function(){
    function initLeft(){
        w = $(".slide-show").css("width");
        w = w.substring( 0,w.length - 2);
        for(let i = 0 ; i < $(".slide-img").length ; i++){
            $(".slide-img").eq(i).css("left", (2*i*w) + "px");
        }
    }
    function toLast(){
        initLeft();
        w = $(".slide-show").css("width");
        w = w.substring( 0,w.length - 2);
        var l = $(".slide-img").length
        for(let i = 0 ; i < l ; i++){
            $(".slide-img").eq(i).css("left", (2*(i - l +1)*w) + "px");
            console.log(i-l);
        }
    }
    var w = $(".slide-show").css("width");
    var w = Number(w.substring( 0,w.length - 2));
    initLeft();
    $(window).resize(initLeft)
    $(".prev").click(function(){
        for(let j = 0 ; j < $(".slide-img").length ; j++){
            
            let left = $(".slide-img").eq(j).css("left");
            left = Number(left.substring( 0,left.length - 2))
            if(Math.abs(left) <= 0.5*w  && j == 0){
                toLast();
                break;
            }
            else{
                var x = left + 2*w;
                $(".slide-img").eq(j).css("left", x + "px");
            }
            
        }
    })
    $(".next").click(function(){
        for(let j = 0 ; j < $(".slide-img").length; j++){
            let left = $(".slide-img").eq(j).css("left");
            left = left.substring( 0,left.length - 2)
            if(left <= -5*w && j == 0){
                initLeft();
                break;
            }
            else{
                $(".slide-img").eq(j).css("left", left - 2*w + "px");
            }
        }
    })
})