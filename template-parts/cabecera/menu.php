<!-- HAMBURGUESA -->

<div class="hamburguesa">
		<span></span>
		<span></span>
		<span></span>
</div>

<!-- MENU PRINCIPAL -->

<nav class="menu-principal">
	<?php
		wp_nav_menu( array( 
			'theme_location' => 'MenuSuperior',
			'container'       => false,
		));
	?>
</nav>