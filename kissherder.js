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
			_kmq.push(['record', 'Comment']);
		});
	});
	
})(jQuery);
