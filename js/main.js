// funcion para cambiar el navbar
$(document).ready(function(){
  var checkScrollBar = function(){
    $('.bg-main').css({
          backgroundColor: $(this)
          .scrollTop() > 1 ?
          'rgb(52, 73, 94, .5)' : 'bg-centro'
    })
  }
$(window).on('load resize scroll', checkScrollBar)
});

// funcion ir hacia arriba
$(document).ready(function(){ //Hacia arriba
  irArriba();
});

function irArriba(){
  $('.ir-arriba').click(function(){
    $('body,html').animate({ scrollTop:'0px' },1000);
  });
  $(window).scroll(function(){
    if($(this).scrollTop() > 0){
       $('.ir-arriba').slideDown(600); }else{ $('.ir-arriba').slideUp(600);
     }
  });
  $('.ir-abajo').click(function(){
    $('body,html').animate({
      scrollTop:'1000px' },1000);
    });
}
// funcion scroll
$(document).ready(function(){
 let scroll_link = $('.scroll');

  //smooth scrolling -----------------------
  scroll_link.click(function(e){
      e.preventDefault();
      let url = $('body').find($(this).attr('href')).offset().top;
      $('html, body').animate({
        scrollTop : url
      },700);
      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');
      return false;
   });
});
