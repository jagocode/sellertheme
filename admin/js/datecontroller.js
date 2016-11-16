
jQuery(document).ready(function( $ ) {
	
	$('#mycalendar2').monthly({
    mode: 'picker',
    // The element that will have its value set to the date you picked
    target: '#eventdate',
    // Set to true if you want monthly to appear on click
    startHidden: true,
    // Element that you click to make it appear
    showTrigger: '#eventdate',
    // Add a style to days in the past
    stylePast: true,
    // Disable clicking days in the past
    disablePast: true
});
	
});
