<?php get_header(); ?>
<nav class="Archive__nav">
    <button class="Archive__button">カテゴリーメニュー</button>
    <?php
        wp_nav_menu(array(
            'theme_location' => 'work-menu',
            'container'      => '',
            'menu_class'     => 'Archive__list',
        ));
    ?>
</nav>

<main class="Post wrapper section">
    <div class="Post__content">
        <?php the_content(); ?>
    </div>

    <div class="Post__list">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 9,    
            'paged'          => $paged 
        ));

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <article class="Post__item">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="Post__link">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'Post__img')); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri('/img/ph.png')); ?>" alt="" class="Post__img">
                        <?php endif; ?>
                    </a>
                    <div class="Post__header">
                        <h2 class="Post__title">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                        </h2>
                        <ul class="Categories">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<li class="Categories__item">';
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="Categories__link">' . esc_html($category->name) . '</a>';
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </article>
            <?php endwhile;
        else : ?>
            <p>記事はありません。</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?> 
    </div>

    <div class="Post__nav">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $max_pages = $query->max_num_pages;

        if ($paged > 1) : ?>
            <a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>" class="Button">
                <button class="Button_item">← More Works</button>
                <div class="Button__border"></div>
                <div class="Button__border"></div>
            </a>
        <?php endif; ?>

        <?php if ($paged < $max_pages) : ?>
            <a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>" class="Button">
                <button class="Button_item">View More →</button>
                <div class="Button__border"></div>
                <div class="Button__border"></div>
            </a>
        <?php endif; ?>
    </div>

</main>

<?php get_footer(); ?>
