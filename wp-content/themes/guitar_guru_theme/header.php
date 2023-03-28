<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body class="d-flex flex-column h-100">
		<?php
			if (!is_user_logged_in()){
				get_template_part('template-parts/reg-form');
				get_template_part('template-parts/log-form');
			}
			else get_template_part('template-parts/exit-form');
		?>
    <header>
			<nav class="navbar navbar-dark bg-dark fixed-top shadow">
				<div class="container">
					<a class="navbar-brand" href="<?=get_home_url()?>"><?bloginfo('name')?></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      			<span class="navbar-toggler-icon"></span>
    			</button>
					<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="width: 280px; top: 56px;">
						<div class="offcanvas-header">
        			<h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Меню</h5>
        			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      			</div>
						<?php
							$args = array(
								'menu'	=> 2,
								'container_class' => 'offcanvas-body',
								'menu_class' => 'navbar-nav justify-content-end flex-grow-1 pe-3',
								'walker' => new Main_Walker_Nav_Menu()
							);
							wp_nav_menu( $args );
						?>
					</div>
				</div>
			</nav>
    </header>
