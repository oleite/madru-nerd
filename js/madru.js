jQuery(document).ready(function($) {

   $(window).load(function() {
     $('img').responsify();
   });

   $(window).resize(function(){
     $('img').responsify();
   })



   var sliderWidth = $('.slider-scroll').width();
   var scrollDistance = 0;

   $('.slider-scroll').hammer().on("swipeleft tap press", function(ev) {
      console.log(ev.type +" gesture detected.");

      scrollDistance = scrollDistance - sliderWidth;
      console.log(scrollDistance);

      $('.slider-content').css({
         "transform" : "translateX(" + scrollDistance + "px)"
      });
   });
   $('.slider-scroll').hammer().on("swiperight tap press", function(ev) {
      console.log(ev.type +" gesture detected.");

      if(scrollDistance != 0) {

         scrollDistance = scrollDistance + sliderWidth;
         console.log(scrollDistance);

         $('.slider-content').css({
            "transform" : "translateX(" + scrollDistance + "px)"
         });

      } else {
         $('.slider-content').addClass('cant-slide-right');
         setTimeout(function(){
            $('.slider-content').removeClass('cant-slide-right');
         }, 500);
      }

   });

});
