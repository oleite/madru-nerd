jQuery(document).ready(function($) {

   $(window).load(function() {
     $('img').responsify();
   });

   $(window).resize(function(){
     $('img').responsify();
   })



});
