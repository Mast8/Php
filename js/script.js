$( document ).ready(function() {
	var is = true;
    $(".puerta").click(function(){
    	if(is){
    		console.log("YES");
    		$(".puerta").css("-webkit-transform", "rotateY(180deg)");
    		$(".puerta").css("transform", "rotateY(180deg)");
    	}else{
    		console.log("NO");
    		$(".puerta").css("-webkit-transform", "rotateY(-180deg)");
    		$(".puerta").css("transform", "rotateY(0deg)");
    	}
    	is = !is;
    });
    $("#goToPage1").click(function () {
        $('html,body').animate({
            scrollTop: $("#page1").offset().top
        }, 2000);
    });
    $("#goToPage2").click(function () {
        $('html,body').animate({
            scrollTop: $("#page2").offset().top
        }, 2000);
    });
    $("#goToPage3").click(function () {
        $('html,body').animate({
            scrollTop: $("#page3").offset().top
        }, 2000);
    });
});