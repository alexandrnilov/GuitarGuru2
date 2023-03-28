<?php
/**
 * Template Name: Library Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<main class="flex-shrink-0">
  <h1><?=wp_title()?></h1>
  <div class="container">
  <?php
    if ( have_posts() ) {
  		while ( have_posts() ) {
  			the_post();
  			get_template_part( 'template-parts/content-cover' );
  		}
	  }
	?>
  </div>
</main>
<?php
get_footer();
