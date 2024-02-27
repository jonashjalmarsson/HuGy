<?php

add_action('wp_ajax_nopriv_hugy_load_more_news', 'hugy_load_more_news');
add_action('wp_ajax_hugy_load_more_news', 'hugy_load_more_news');
function hugy_load_more_news() {
    $news_per_page = $_POST['news_per_page'];
    $paged = $_POST['paged'];
    $news = HuGy::get_text_news($news_per_page, $paged);
    echo $news;
    die();
}