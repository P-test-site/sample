$(function(){

  $('#top-copy').fadeIn(4000);

  $('.menu-btn').hover(
    function(){
      $(this).css('background', 'rgba(0,0,0,0.5)');
    },
    function(){
      $(this).css('background', 'rgba(0, 128, 128,0)');
    });

    $('#menu-icon').click(function(){
      var $menu = $('#menu');
      if($menu.hasClass('open')){
        $menu.slideUp().removeClass('open');
        $('#menu-icon').css('color', 'black');　
      }else{
        $menu.addClass('open').slideDown();
        $('#menu-icon').css('color', 'white');
      }
    });






  });
