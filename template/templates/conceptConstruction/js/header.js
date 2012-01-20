window.addEvent('domready', function () {
	var header = $('header'),
		buttons = $$('.button');
		

	if (Modernizr.csstransforms) {
		buttons.setStyle('background-image', 'url(/templates/conceptConstruction/images/close.png)');
	}
	
	buttons.addEvent('click', function() {
		if (header.hasClass('close')) {
			if (Modernizr.csstransitions) {
				header.setStyle('height', '390');
			} else {
				header.tween('height', [215, 390]);
			} 
			Cookie.write('windowOpen', 1);
		} else { 
			if (Modernizr.csstransitions) {
				header.setStyle('height', '215')
			} else {
				header.tween('height', [390, 215]);
			}
			Cookie.write('windowOpen', 0);
		}
		header.toggleClass('close');
	});
	
	if (Cookie.read('windowOpen') === '0') {
		header.addClass('close');
	}
});

window.addEvent('load', function() {
	$('header').setStyles({
		'-webkit-transition': 'height 0.4s ease-in-out',
		'-moz-transition': 'height 0.4s ease-in-out',
		'-o-transition': 'height 0.4s ease-in-out',
		'-ms-transition': 'height 0.4s ease-in-out',
		'transition': 'height 0.4s ease-in-out'
	});
	$$('.button').setStyles({
		'-webkit-transition': '-webkit-transform 0.4s ease-in-out',
		'-moz-transition': '-moz-transform 0.4s ease-in-out',
		'-o-transition': '-o-transform 0.4s ease-in-out',
		'-ms-transition': '-ms-transform 0.4s ease-in-out',
		'transition': 'transform 0.4s ease-in-out'
	});
})