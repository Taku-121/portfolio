<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('/images/leaf-left.svg')); ?>" type="image/svg+xml">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="Header">
        <div class="Header__flex">
            <h1 class="Header__title">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="Header__logo"><img src="<?php echo esc_url(get_theme_file_uri('/img/logo.svg')); ?>" alt="<?php bloginfo('name'); ?>" class="Header__logoImg"></a>
            </h1>
            
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'container'=>'nav',
                        'container_class'=>'Header__nav',
                        'menu_class' =>'Header__list',
                    )
                );
            ?>
        </div>
    </header>
    
