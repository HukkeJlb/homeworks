<?php

add_theme_support('post-thumbnails', array('post'));
add_theme_support('post-thumbnails');

function get_thumbnail()
{
    $thumbnail = get_the_post_thumbnail_url();
    if (!$thumbnail) {
        return "/img/post_thumb/thumb_1.jpg";
    } else {
        return $thumbnail;
    }
}

function my_pagenavi()
{
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
    );

    $result = paginate_links($args);

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace('/page/1/', '', $result);

    echo $result;
}
