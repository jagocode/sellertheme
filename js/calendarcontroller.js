(function($) {
	
	  $(window).load( function() {
        $('#mycalendar').monthly({
					mode:'event',
					jsonUrl: 'http://seller-center-wiryosaputro266782.codeanyapp.com/wp-content/themes/sellercenterv3/js/events.json',
			    dataType: 'json'
				});
    });
})( jQuery );