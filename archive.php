<?php get_header(); ?>

	<div id="main" class="page-news clearfix">

		<?php get_template_part( '_/php/news/header' ); ?>

		<article>
			<?php
			the_archive_title( '<h2 class="news-type-title">', '</h2>' );

			if ( have_posts() ) {
			?>
			<div class="news-cards">
				<ul class="clearfix">
				<?php
				while ( have_posts() ) {
					the_post();
					// is_post_type_archive( 'in_the_news' );
					$post_type = get_post_type();
					$template  = locate_template( "_/php/cards/$post_type.php" );
					if ( '' !== $template ) {
						get_template_part( "_/php/cards/$post_type" );
					} else {
						get_template_part( '_/php/news/card' );
					}
				}
				?>
				</ul>
				<nav class="navigation pagination" role="navigation">
					<h2 class="screen-reader-text">Posts navigation</h2>
					<div class="nav-links">
					<?php
						$big = 999999999; // need an unlikely integer.

						echo paginate_links(
							array(
								'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'current'   => max( 1, get_query_var( 'paged' ) ),
								'total'     => $wp_query->max_num_pages,
								'prev_text' => __( '‹ Prev' ),
								'next_text' => __( 'Next ›' ),
							)
						);
					?>
					</div>
				</nav>
			</div>
				<?php
			}
			?>
		</article>

	</div>

<?php get_footer(); ?>
