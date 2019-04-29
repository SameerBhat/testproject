jQuery(document).ready(function( $ ) {

    // Initiate the wowjs
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {opacity:'show'},
    speed: 400
  });

// Mobile Navigation
  if( $('#nav-menu-container').length ) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({ id: 'mobile-nav'});
    $mobile_nav.find('> ul').attr({ 'class' : '', 'id' : '' });
    $('body').append( $mobile_nav );
    $('body').prepend( '<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>' );
    $('body').append( '<div id="mobile-body-overly"></div>' );
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e){
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e){
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function (e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
       if ( $('body').hasClass('mobile-nav-active') ) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ( $("#mobile-nav, #mobile-nav-toggle").length ) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }  

// custom code


$('.cls-menuu').click(function(e){

	if($('#mobile-nav').hasClass('open'))
	{
		$('#mobile-nav').removeClass('open');
		$('#mobile-nav-toggle').trigger('click');

	}
	else
	{
		$('#mobile-nav').addClass('open');
		$('#mobile-nav-toggle').trigger('click');
	}

});

});

function goToByScroll(id){
	$('html,body').animate({scrollTop: $("#"+id).offset().top-0},'slow');
}


$(function(){
	$('.month-special-thumb-area a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
	$('.month-special-thumb-area a').click(function(){
		$(this).parent().addClass('active').siblings().removeClass('active')	
	})
	
	$('.nav-menu > li > a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
	$('.nav-menu > li > a').click(function(){
		$(this).parent().addClass('active').siblings().removeClass('active')	
	})

})

window.onscroll = function() {myFunction()};
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
	header.classList.add("sticky");
  } else {
	header.classList.remove("sticky");
  }
}