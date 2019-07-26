/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enabling tab support for dropdown menus.
 */
( function() {
	var container, button, menu, links;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};

	// Get all the link elements within the menu. Return if none are found.
	links = menu.getElementsByTagName( 'a' );
	
	if ( 0 === links.length )
		return;

	// Each time a menu link is focused or blurred call the function toggle_focus
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].onfocus = toggle_focus;
		links[i].onblur = toggle_focus;
	};

	function toggle_focus() {
		
		// Skipping the actual link itself as this can be styled with :focus
		var current = this.parentElement;
		var parents = []
	 
		// Build an array of the parent elements of the focused link until we hit the top level .nav-menu ul
		while ( -1 === current.className.indexOf( 'nav-menu' ) ) {
			parents.unshift( current );
			current = current.parentElement;
		}
	 
		// For each element in parents[] toggle the class .focus
		for ( i = 0, len = parents.length; i < len; i++ ) {
			if ( -1 !== parents[i].className.indexOf( 'focus' ) )
				parents[i].className = parents[i].className.replace( ' focus', '' );
			else
				parents[i].className += ' focus';
		}
	}
} )();