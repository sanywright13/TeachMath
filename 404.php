<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can’t be found.', 'your-theme-textdomain' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'your-theme-textdomain' ); ?></p>

                <?php get_search_form(); ?>

                <div class="widget widget_recent_entries">
                    <h2 class="widget-title"><?php esc_html_e( 'Recent Posts', 'your-theme-textdomain' ); ?></h2>
                    <ul>
                        <?php
                        // Get the 5 most recent posts.
                        $recent_posts = wp_get_recent_posts( array(
                            'numberposts' => 5,
                            'post_status' => 'publish',
                        ) );

                        foreach ( $recent_posts as $post ) :
                        ?>
                            <li>
                                <a href="<?php echo get_permalink( $post['ID'] ); ?>">
                                    <?php echo esc_html( $post['post_title'] ); ?>
                                </a>
                            </li>
                        <?php endforeach; wp_reset_query(); ?>
                    </ul>
                </div><!-- .widget -->

                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'your-theme-textdomain' ); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories( array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        ) );
                        ?>
                    </ul>
                </div><!-- .widget -->

                <?php
                the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>" );
                ?>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
