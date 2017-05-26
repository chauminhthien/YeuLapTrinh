$(document).ready(function(){
	$(".all").load("../admin/home.php");

	$(document).on('click','a[data=menu]',function(){
		var file = $(this).attr('data-menu');
		$('a[data=menu]').removeClass('act');
		$(this).addClass('act')

		$('.all').load("../admin/" + file + ".php");

		return false;
	});
});