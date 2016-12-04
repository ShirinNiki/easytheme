<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package my-simone
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );


			echo '<nav class="navigation post-navigation" role="navigation"><div class="post-nav-box clear">'
			       .'<h1 class="screen-reader-text">' .'</h1><div class="nav-links">';

			the_post_navigation();

			echo '</div><!-- .nav-links --></div><!-- .post-nav-box --></nav><!-- .navigation --> ';


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
					comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
