window.addEvent('domready', function () {
	var header = $('header'),
		buttons = $$('.button');

	if (Modernizr.csstransforms) {
		buttons.setStyle('background-image', 'url(/templates/conceptConstruction/images/close.png)');
	}
		
	buttons.addEvent('click', function() {
		if (header.hasClass('close')) {
			header.tween('height', '390');
			Cookie.write('windowOpen', 1);
		} else {
			header.tween('height', '215');
			Cookie.write('windowOpen', 0);
		}

		header.toggleClass('close');
	});
	
	if (Cookie.read('windowOpen') === '0') {
		header.addClass('close');
	}
	
	console.log(Cookie.read('windowOpen'));
	
	
});

