<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package my-simone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php
		if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // Custom template for the first post on the front page
			if (has_post_thumbnail()) {
				echo '<div class="front-index-thumbnail clear">';
				echo '<div class="image-shifter">';
				echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
				echo the_post_thumbnail('large-thumb');
				echo '</a>';
				echo '</div>';
				echo '</div>';
			}
			echo '<div class="index-box';
			if (has_post_thumbnail()) { echo ' has-thumbnail'; };
			echo '">';
		} else {
			echo '<div class="index-box">';
			if (has_post_thumbnail()) {
				echo '<div class="small-index-thumbnail clear">';
				echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
				echo the_post_thumbnail('index-thumb');
				echo '</a>';
				echo '</div>';
			}
		}
		?>


			<header class="entry-header">
				<?php
				/* if the post is sticky */
				if(is_sticky()){
					echo '<i class="fa fa-thumb-tack sticky-post" aria-hidden="true"></i>';
				}


				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'my-simone' ) );

				if ( my_simone_categorized_blog() ) {
					echo '<div class="category-list">' . $category_list . '</div>';
				}
				?>
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php my_simone_posted_on(); ?>
					<?php
					if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
						echo '<span class="comments-link">';
						comments_popup_link( __( 'نظر دهید', 'my-simone' ), __( '1 Comment', 'my-simone' ), __( '% Comments', 'my-simone' ) );
						echo '</span>';
					}
					?>
					<?php edit_post_link( __( 'Edit', 'my-simone' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
			the_excerpt();
		?>

	</div><!-- .entry-content -->

		<footer class="entry-footer continue-reading">
			<?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'my-simone') . get_the_title() . '" rel="bookmark">ادامه مطلب<i class="fa fa-arrow-circle-o-left"></i></a>'; ?>
		</footer><!-- .entry-footer -->


	</div>	<!-- .index-box -->
</article><!-- #post-## -->
