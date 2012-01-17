window.addEvent('domready', function () {
	var header = $('header'),
		buttons = $$('.button');
		
	if (Modernizr.csstransforms) {
		buttons.setStyle('background-image', 'url(/templates/conceptConstruction/images/close.png)');
	}
		
	buttons.addEvent('click', function() {
		if (header.hasClass('close')) {
			header.tween('height', '400');
		} else {
			header.tween('height', '200');
		}

		header.toggleClass('close');
	});
});