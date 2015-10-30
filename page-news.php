<?php

get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post(); ?>

    <div id="main" class="page-news clearfix">

        <header>
            
            <h1>News</h1>

            <ul class="news-subnav clearfix">
                <li><a href="<?php echo get_page_link( 7224 ) ?>">Publications</a></li>
                <li><a href="">For Media</a></li>
                <li><a href="">About Public Affairs</a></li>
            </ul>

            <ul class="news-filters">
                <li class="active"><a href="/news">All</a></li>
                <li><a href="<?php $category_id = get_cat_ID( "Editor's Picks" ); echo esc_url(get_category_link( $category_id )); ?> ">Editor's Picks</a></li>
                <li class="parent"><a href="">Topics</a>
                    <ul><?php echo wp_list_categories( 'title_li=' ); ?></ul>
                </li>
                <li class="parent"><a href="">Source</a>
                    <?php  $terms = get_terms( 'news', 'orderby=count&order=DESC' );
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        echo '<ul>';
                        foreach ( $terms as $term ) {
                            echo '<li>' . '<a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
                            
                        }
                        echo '</ul>';
                    } ?>
                </li>
            </ul>

        </header>

        <article>

            <?php $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'category_name' => 'editors-pick',
            );
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) { ?>
            <div class="editors-pick">
                <?php while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>
                    <div>
                        <a href="<?php ( get_field('url') ? the_field('url') : the_permalink() ) ?>">
                                <?php the_post_thumbnail(); ?>
                        </a>
                        <div class="editors-pick-text">
                            <p class="article-date"><?php the_time('M j, Y'); ?></p>
                            <a href="<?php ( get_field('url') ? the_field('url') : the_permalink() ) ?>">
                                <?php the_title('<h2>', '</h2>'); ?>
                            </a>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>

            <div class="news-cards">

            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 24,
                'paged' => $paged
            );
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) { ?>
                <ul class="clearfix">
                <?php while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>
                    <li>
                        <div class="card">
                            <?php if(has_post_thumbnail()) { ?>
                                <a href="<?php ( get_field('url') ? the_field('url') : the_permalink() ) ?>">
                                    <?php the_post_thumbnail('in-the-news'); ?>
                                </a>
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri() . '/_/img/default.jpg' ?>">
                            <?php } ?>
                            <p class="article-meta"><?php the_time('M j, Y'); ?>
                            <?php if(get_field('source')):
                                echo '<span class="news-source">&bull; ' . get_field('source') . '</span>';
                            endif; ?>
                            </p>
                            <a href="<?php ( get_field('url') ? the_field('url') : the_permalink() ) ?>">
                                <?php the_title('<h2>', '</h2>'); ?>
                            </a>
                            <?php the_excerpt(); ?>
                        </div>
                    </li>
                <?php } ?>
                </ul>
            </div>
                <?php if ($the_query->max_num_pages > 1) { ?>
                    <div class="pagination">
                        <div class="next-posts"><?php next_posts_link( 'Load More', $the_query->max_num_pages ); ?></div>
                    </div>
                <?php } ?>
            <?php }
            wp_reset_postdata(); ?>

        </article>

    </div>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>