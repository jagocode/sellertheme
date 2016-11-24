(function($) {
	
	  $(window).load( function() {
        $('#mycalendar').monthly({
					mode:'event',
					jsonUrl: 'https://sellercenter-jagocode.c9users.io/wp-content/themes/sellercenterv3/js/events.json',
			    dataType: 'json'
				});
    });
})( jQuery );