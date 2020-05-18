$(".navbar a").click(function(){
	$("boby,html").animate({
		scrollTop:$("#" + $(this).data('value')).offset().top
	},1000)
})