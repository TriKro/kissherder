(function($) {
	$(document).ready( function() {
		//instrument feed clicks
		$('a[href*="/feed/"]').click( function() {
			_kmq.push(['record', 'Subscribe RSS']);
		});
		$('a[href*="feed="]').click( function() {
			_kmq.push(['record', 'Subscribe RSS']);
		});
		
		//instrument comment form
		$('#commentform').submit(function() {
			_kmq.push(['trackSubmit', 'commentform', 'Comment form submitted']);
		});
		
		//track "read" items (after 2 minutes)
		setTimeout(function() {
			_kmq.push(['record', 'Read article']);
		}, 120000);
	});
	
})(jQuery);
