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
			//$(value).hide().prependTo("#timeline").fadeIn(1000);
			$(value).hide().prependTo("#timeline").fadeIn(1000,function(){
				var image_height = $('#tweet_'+key+' .crop img').css('height');
				if(image_height !== undefined){
					console.log('#tweet_'+key+' .crop img');
					console.log('image_height_px = '+image_height);
					image_height = parseInt(image_height.replace('px',''));
					var window_height = $(window).height()/3;
					var margin_top = 0;
					if(image_height > window_height){
						margin_top = (image_height - window_height) / 2;
					}
					console.log('window_height = '+window_height);
					console.log('image_height = '+image_height);
					console.log('margin_top = '+margin_top);
					$('#tweet_'+key+' .crop img').css('margin-top','-'+margin_top+'px');
					$('.crop').css('max-height',window_height);
					console.log($('#tweet_'+key+' .crop img').css('height'));
				}
			});
			//debugger;

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
		url: '/twitter/gettweets/count/5',
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
