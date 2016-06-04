//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});



$(".btn-group > .btn").click(function(){
    $(this).addClass("active").siblings().removeClass("active");
});

$('#yesBtn').click(function(){
	// $('#message').attr('')
	// alert('yes clicked');
	var value =  $('#yesBtn').text();
	console.log(value);

	$('#formResp').text("Y");
	$('#formResp').hide();


	$('#message').text(value);
	 event.preventDefault();
});

$('#noBtn').click(function(){
	var value =  $('#noBtn').text();
	console.log(value);

	$('#formResp').text("N");
	$('#formResp').hide();

	$('#message').text(value);
	 event.preventDefault();

});
