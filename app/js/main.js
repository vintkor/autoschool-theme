$('table').addClass('table table-hover');

$(document).ready(function() {
	$('#a_list').click(function(){
		$('#a_list').addClass('span-active');
		$('#a_maps').removeClass('span-active');
		$('#yamaps').css({
			"display": "none"
		});
		$('#list').css({
			"display": "block"
		});
	});

	$('#a_maps').click(function(){
		$('#a_maps').addClass('span-active');
		$('#a_list').removeClass('span-active');
		$('#list').css({
			"display": "none"
		});
		$('#yamaps').css({
			"display": "block"
		});
	});
});