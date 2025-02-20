<?php
// ファイルの読み込み
function add_files() {
    
    // リセットCSS
    wp_enqueue_style('reset-style', 'https://unpkg.com/destyle.css@2.0.2/destyle.css');
    // google fonts
    wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap');

    // メインCSS
    wp_enqueue_style('main-style',get_stylesheet_uri());

    // フロントページ用CSS
    if( is_front_page() ){
        wp_enqueue_style('index_style', get_stylesheet_directory_uri() . '/css/index-style.css', array('main-style'));
    }

    // ワークページ用CSS（固定ページ・投稿・アーカイブページ）
    if( is_page() || is_single() || is_archive() ){
        wp_enqueue_style('work-style', get_stylesheet_directory_uri() . '/css/work-style.css', array('main-style'));
    }

    // JavaScript
    wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '', true);
    
}
add_action('wp_enqueue_scripts', 'add_files');

// テーマ設定
function theme_setup(){
    // アイキャッチ画像
    add_theme_support('post-thumbnails');

    // title タグ
    add_theme_support('title-tag');
    
    // メニュー
    register_nav_menus(
        array(
            'main-menu' => 'メインメニュー',
            'work-menu' => 'ワークメニュー',
        )
    );
}
add_action('after_setup_theme', 'theme_setup');
