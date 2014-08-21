/**
 * Created by Vovanada on 19.08.14.
 */

tweets = new Object();
var last_tweet = '';

$(document).ready(function () {
	getTweet();

	setInterval(function () {
		getTweet();
	}, 10000);

	setInterval(function () {

		$.each( tweets, function( key, value ) {
			//$("#timeline").prepend($(value).hide().fadeIn(1000));
			$(value).hide().prependTo("#timeline").fadeIn(1000);
			delete tweets[key];
			return false;
		});


	}, 5000);
});

function getTweet(){
	$.ajax({
		type: 'POST',
		dataType: 'json',
		data : {last_tweet : last_tweet},
		url: '/twitter/gettweets/count/3',
		success: function(data) {
			var count = 0;
			$.each(data, function( index, value ) {
				tweets[index] = value;
				last_tweet = index;
				if(count == 0){
				}
				count++;
			});
		}
	});
}
