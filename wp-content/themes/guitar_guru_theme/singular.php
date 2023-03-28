<?php
  get_header();
?>
<main class="bg-light">
  <div class="container-fluid">
  <?php
    if ( have_posts() ) {
  		while ( have_posts() ) {
  			the_post();
  			get_template_part( 'template-parts/content' );
  		}
	  }
	?>
  </div>
</main>
<?php
get_footer();
