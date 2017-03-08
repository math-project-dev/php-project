jQuery(document).ready(function() {
	var duration = 300;

	 jQuery('.back-to-top').click(function(event) {

		event.preventDefault();
		jQuery('.sidenav').animate({
		     scrollTop: 0
		}, duration);
		return false;
	})
});
		 