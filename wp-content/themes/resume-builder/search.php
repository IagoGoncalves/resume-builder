<?php get_header(); ?>
    <main id="search-page" class="search-page" role="main">
        <section class="container">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h1 class="small-title">
                        <?php printf( esc_html__( 'Resultados da busca para: %s', 'textdomain' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </h1>
                </header>
                <article>
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="subtitle"><?php the_title(); ?></a>
                        <?php
                    endwhile;
                    the_posts_navigation(); ?>
                </article>
            <?php endif;
            ?>
        </section>
    </main>
<?php get_footer(); ?>
