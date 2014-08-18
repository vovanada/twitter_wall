/**
 * Created by Vovanada on 19.08.14.
 */

$(document).ready(function () {
	setInterval(function () {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '/twitter/gettweets/count/1',
			success: function(data) {
				$.each(data, function( index, value ) {
					$("#timeline").prepend(value);
				});
			}
		});
	}, 10000);
});

