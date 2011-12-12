(function($) {
	$(document).ready( function() {
		//instrument feed clicks
		$('a[href*="/feed/"]').click( function() {
			_kmq.push(['record', KissHerder.subscribeEvent, KissHerder.subscribeOptions]);
		});
		$('a[href*="feed="]').click( function() {
			_kmq.push(['record', KissHerder.subscribeEvent, KissHerder.subscribeOptions]);
		});
		
		//instrument comment form
		$('#commentform').submit(function() {
			_kmq.push(['trackSubmit', 'commentform', KissHerder.commentEvent, KissHerder.commentOptions]);
		});
		
		//track "read" items (after 2 minutes)
		setTimeout(function() {
			_kmq.push(['record', KissHerder.readEvent, KissHerder.readOptions]);
		}, 120000);
	});
	
})(jQuery);
