$(document).ready(function() {
	$('#problem-list-table tr').each(function() {
		$(this).find('#rating').each(function() {
			val = parseInt($(this).text());
			$(this).html("");
			$(this).starrr({
				rating: val,
  				readOnly: true
			})
		});
	});
});