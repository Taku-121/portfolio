<?php get_header() ?>
    <main class="Page wrapper section">
        <?php if ( have_posts() ) : while( have_posts()) : the_post(); ?>
        <section class="Page__box wrapper">
            <h2 class="Page__title indices"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </section>
        <?php endwhile; else: ?>
            <p>記事はありません。</p>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>