<?php get_header(); ?>
<main class="main">
    <?php if ( have_posts() ) : while( have_posts()) : the_post(); ?>
        <section class="Single wrapper">
            <h2 class="Single__title indices"><?php the_title(); ?></h2>
            <div class="Single__box">
                <div class="commentBox anim-box">
                    <?php the_content(); ?>
                </div>
                <section class="Tags">
                    <?php the_tags('<ul class="Tags__list"><li class="Tags__listItem">','</li><li>','</li></ul>'); ?>
                </section>
            </div>
        </section>
    <?php endwhile; endif; ?> 

    <section class="Work wrapper fadeIn">
        <h2 class="Work__title indices">Work</h2>
        <ul class="Work__list">
            <?php
            $categories = array('web-site', 'dtp', 'video','skjvillage'); 
            $posts_list = array();
            $total_posts_count = 0; 
            $current_post_id = get_the_ID(); 

            foreach ($categories as $category) {
                $query = new WP_Query(array(
                    'category_name'  => $category, 
                    'posts_per_page' => 1,
                    'post_type'      => 'post',
                    'post__not_in'   => array($current_post_id)
                ));

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $posts_list[] = array(
                            'title' =>  wp_kses_post(get_the_title()),
                            'permalink' => esc_url(get_permalink()), 
                            'thumbnail' => has_post_thumbnail() 
                                ? get_the_post_thumbnail(null, 'medium', array('class' => 'Work__listImg')) 
                                : '<img src="' . esc_url(get_theme_file_uri('/img/ph.png')) . '" alt="" class="Work__listImg">'
                        );
                    }
                }

                $total_posts_count += $query->found_posts;
                wp_reset_postdata();
            }

            if (!empty($posts_list)) {
                foreach ($posts_list as $post) {
                    echo '<li class="Work__listItem">';
                    echo '<a href="' . $post['permalink'] . '" class="Work__link">';
                    echo $post['thumbnail']; 
                    echo '<h3 class="Work__listTitle">' . wp_kses_post($post['title']) . '</h3>'; 
                    echo '</a>';
                    echo '</li>';
                }
            } else {
                echo '<p>記事はありません。</p>';
            }
            
            ?>
        </ul>

        <?php if ($total_posts_count > 3) : ?>
            <a href="work/" class="Button">
                <button class="Button_item">More</button>
                <div class="Button__border"></div>
                <div class="Button__border"></div>
            </a>
        <?php endif; ?>
    </section>

</main>
<?php get_footer(); ?>
