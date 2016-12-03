 
function waitForElement(elementPath, callBack){
  window.setTimeout(function(){
    if($(elementPath).length){
      callBack(elementPath, $(elementPath));
    }else{
      waitForElement(elementPath, callBack);
    }
  },500)
}

waitForElement(".panel-body",function(){        

    $("div.panel-heading").each(function() {
        $(this).siblings("*").hide();
    });

    $("div.panel-heading").click(toggleContent);
});



waitForElement(".map",function(){        

//    $(".map").each(function() {
////        console.log($(this).parent.siblings("*"));
//        $(this).parent.siblings("*").hide();
//    });

    $(".map").click(toggleMap);
});


function toggleContent(event) {
    event.preventDefault();
    $(this).siblings("*").toggle();
}

function toggleMap(event){
    event.preventDefault();
//    console.log($(this).parent().parent().parent().parent());
//$(this).parent().parent().parent().parent().parent().siblings(".inner").append('<div class="show_map" style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='+ $(this).parent().parent().parent().parent().parent().siblings("*").attr("id") +'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />' );
    $(this).parent().parent().parent().parent().siblings("div.inner").append('<div style="width: 100%"><iframe width="100%" height="300" src="http://www.mapi.ie/create-google-map/map.php?width=100%&amp;height=300&amp;hl=en&amp;coord='+ $(this).parent().parent().parent().parent().siblings("div.inner").attr("id") +'3&amp;q=+(Lieu d\'achat)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> </iframe></div><br />' );

}