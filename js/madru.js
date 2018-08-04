jQuery(document).ready(function($) {

   $(window).load(function() {
     $('.responsify img').responsify();
   });
   $(window).resize(function(){
     $('.responsify img').responsify();
  });



   var sliderWidth = $('.slider-scroll').width();

   var scrollPosX = 0;
   var scrollResultX = 0;


   $('.slider-scroll').hammer().on("panleft", function(ev) {
      scrollResultX = scrollPosX + ev.gesture.deltaX;
      console.log('panleft', scrollResultX);


      var target = ev.target;
      $(target).css({
         'transform': 'translateX(' + scrollResultX + 'px)'
      });

   });
   $('.slider-scroll').hammer().on("panright", function(ev) {


      if(scrollResultX <= 0) {

         scrollResultX = scrollPosX + ev.gesture.deltaX;
         console.log('panright', scrollResultX);

         var target = ev.target;
         $(target).css({
            'transform': 'translateX(' + scrollResultX + 'px)'
         });

      } else {
         $('.slider-content').addClass('cant-slide-right');
         setTimeout(function(){
            $('.slider-content').removeClass('cant-slide-right');
         }, 500);

      }

   });

   $('.slider-scroll').hammer().on("pan", function(ev) {
      console.log('Velocidade: ' + ev.gesture.velocity)
   });

   $('.slider-scroll').hammer().on('panend', function(ev) {

   if( scrollResultX > 0) {
      scrollResultX = 0;

      $(target).css({
         'transform': 'translateX(' + scrollResultX + 'px)'
      });
   }


//-----
      var velocity = ev.gesture.velocity * 1000;

      var inercia = {drag: scrollResultX};


      var target = ev.target;

      $(inercia).animate({
         drag: scrollResultX + (100 * ev.gesture.velocity),
      }, {
         duration: ev.gesture.velocity * 100,
         step: function(current) {
            scrollResultX = current;
            console.log('current: ' + scrollResultX);


            $(target).css({
               'transform': 'translateX(' + current + 'px)'
            });


         }
      });


//----

      scrollPosX = scrollResultX;

      console.log('panend', scrollResultX);

   });


});
