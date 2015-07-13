/*
*	####################
*	jQuery Snippet for smooth scrolling top
*	####################
*/

/* 
*	--------------------
*	Part 1:
*	change default behaviour of all href with an anchor as target
*	--------------------
*/
$( document ).ready(function() {
  $('a[href^=#]').on('click', function(e){
    var href = $(this).attr('href');
    $('html, body').animate({
        scrollTop:$(href).offset().top
    },'slow');
    e.preventDefault();
});
});

/* 
*	--------------------
*	Part 2:
*	show/hide scrollTop Button depending on window location
*	--------------------
*/
$(window).scroll(function() {
    if ($(this).scrollTop() > 1) 
	{
		$('.top_btn').fadeIn();
    }
	else 
	{
		$('.top_btn').fadeOut();
    }
});