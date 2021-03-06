<?php

$card_class = '';
if ( has_term( 'national-leaders', 'news' ) || has_term( 'obituaries', 'news' ) ) {
	$card_class = ' class="headshot"';
}
?><li<?php echo $card_class; ?>>
	<div>
		<?php
		$home_analytics_title = '';
		if ( has_term( 'national-leaders', 'news' ) && is_front_page() ) {
			$home_analytics_title = 'data-category="Front page" data-action="Cards - National Leaders"';
		} elseif ( is_front_page() ) {
			$home_analytics_title = 'data-category="Front page" data-action="Cards - News"';
		}
		?>
		<a <?php echo $home_analytics_title; ?> href="<?php ( get_field( 'url' ) ? the_field( 'url' ) : the_permalink() ); ?>">
			<div class="card">
				<?php
				if ( has_post_thumbnail() && ( has_term( 'national-leaders', 'news' ) || has_term( 'obituaries', 'news' ) ) ) {
					the_post_thumbnail( 'headshot' );
				} elseif ( has_post_thumbnail() && get_field( 'featured_video_url' ) ) {
					?>
				<div class="video-card-image">
					<?php the_post_thumbnail( 'news' ); ?>
					<img src="<?php echo get_template_directory_uri() . '/_/img/play.png'; ?>" class="video-play-icon">
				</div>
					<?php
				} elseif ( has_post_thumbnail() ) {
					the_post_thumbnail( 'news' );
				} elseif ( has_term( 'national-leaders', 'news' ) || has_term( 'obituaries', 'news' ) ) {
					?>
										<img src="<?php echo get_template_directory_uri() . '/_/img/spotlight-default.png'; ?>">
									<?php } else { ?>
						<img src="<?php echo get_template_directory_uri() . '/_/img/default.jpg'; ?>">
					<?php } ?>
				<div class="card-text">
				<?php if ( get_field( 'audio' ) ) { ?>
				<img class="has-audio" src="<?php echo get_template_directory_uri() . '/_/img/audio/audio.png'; ?>">
				<?php } ?>
				<p class="article-date"><?php the_time( get_option( 'date_format' ) ); ?></p>
				<?php
				the_title( '<h2 class="article-title">', '</h2>' );
				if ( has_excerpt() ) {
					echo '<p>' . get_the_excerpt() . '.</p>';
				}
				if ( get_field( 'source' ) ) {
					echo '<p class="news-source">Source: ' . get_field( 'source' ) . '</p>';
				} else {
					$terms     = get_the_terms( $post, 'news' );
					$term_list = array();
					if ( $terms ) {
						foreach ( $terms as $term ) {
							// Don't include More News in the list of terms.
							if ( 'More News' !== $term->name ) {
								$term_list[] = $term->name;
							}
						}
					}
					if ( $term_list ) {
						echo '<p class="news-source">' . implode( ', ', $term_list ) . '</p>';
					}
				}
				?>
				</div>
			</div>
		</a>
	</div>
</li>
