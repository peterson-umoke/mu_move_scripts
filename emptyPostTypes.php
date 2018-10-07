<?php

// require the autoload file
require_once dirname(__FILE__) . "/vendor/autoload.php";

// init the database connection
$db = new CustomDatabase();
for ($i = 2; $i <= 14; $i++) {

    // set the prefix
    $prefix = "wp_{$i}_";

    // make sure we dont upload products in a post
    if ($i !== 6) {
        $post_type = "post";
        $query = "DELETE posts, postmeta FROM wp_posts as posts INNER JOIN wp_postmeta as postmeta WHERE posts.post_type = '{$post_type}' and postmeta.post_id = posts.id";
        // get all related posts
        $db->query($query);
        echo "deleted all post types for {$post_type}" . PHP_EOL;
    } else {
        $post_type = "product";
        $query = "DELETE posts, postmeta FROM wp_posts as posts INNER JOIN wp_postmeta as postmeta WHERE posts.post_type = '{$post_type}' and postmeta.post_id = posts.id";
        // get all related posts
        $db->query($query);
        echo "deleted all post types for {$post_type}" . PHP_EOL;
    }
}