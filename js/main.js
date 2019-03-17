// A $( document ).ready() block.
$( document ).ready(function() {

//Add a class to menu
$( "a.main-menu-link" ).click(function() {
    $('a.main-menu-link').removeClass("active");
    $(this).addClass("active");
});

//Click on image and add class to menu
$( ".parent-logo a" ).click(function() {
    $('a.main-menu-link').removeClass("active");
    var li=$('.parent-menu .main-menu ul');
    $(li).children().children(":first").addClass("active");

});

    //Display header responsive
    var click=0;
$( ".container-hamburger .icon-menu" ).click(function() {
    click+=1;
    if(click%2!=0){
    $(".header-responsive").css("display","block");
    }else{
    $(".header-responsive").css("display","none");
    }
});
$( window ).resize(function() {
  if(click%2!=0){
   if($( window ).width()>992){
    $(".header-responsive").css("display","none");
    }else{
    $(".header-responsive").css("display","block");
    }
    }
    });

// Active for the second menu
    //Add a class to menu
$( ".menu-item-responsive" ).click(function() {
$('.menu-item-responsive').removeClass("active");
$(this).addClass("active");
});

    });
