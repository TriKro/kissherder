(function($) {
	$(document).ready( function() {
		//instrument feed clicks
		$('a[href*="/feed/"]').click( function() {
			_kmq.push(['record', 'Subscribe RSS']);
		});
		$('a[href*="feed="]').click( function() {
			_kmq.push(['record', 'Subscribe RSS']);
		});
	});
})(jQuery);
