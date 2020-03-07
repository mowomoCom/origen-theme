jQuery(document).ready(function() {
	var opening = true;

	// HAMBURGER ANIMATION
	jQuery('.site-hamburger').click(function() {
		opening = false;
		jQuery(this).toggleClass('animation');
		jQuery('body').toggleClass('menu-is-open');
		jQuery('.site-menu').toggleClass('is-open');
		setTimeout(() => {
			opening = true;
		}, 500);
	});

	// CREAR ELEMENTO PARA ABRIR MENU EN MOVIL (FLECHA)
	jQuery('.menu-item-has-children, .page_item_has_children').prepend(
		'<span class="menu-dropdown"></span>'
	);

	// TOGGLE CLASS SOLO UNA VEZ AL PULSAR LA FLECHA
	jQuery('.menu-dropdown').click(function() {
		if (
			jQuery(this)
				.siblings('.sub-menu, .children')
				.hasClass('is-expanded')
		) {
			jQuery(this)
				.siblings('.sub-menu, .children')
				.removeClass('is-expanded');
			jQuery(this).removeClass('rotate');
		} else {
			jQuery(this)
				.siblings('.sub-menu, .children')
				.addClass('is-expanded');
			jQuery(this).addClass('rotate');
		}
	});

	// CIERRA MENU CUANDO PULSAS EN OTRO LADO DE LA PANTALLA
	jQuery(document.body).on('click', function() {
		if (opening) {
			console.log(jQuery(this));
			jQuery('.site-hamburger.animation').removeClass('animation');
			jQuery('.site-menu.is-open').removeClass('is-open');
			jQuery('body.menu-is-open').removeClass('menu-is-open');
		}
	});
});
