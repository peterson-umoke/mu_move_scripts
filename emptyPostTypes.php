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
        // get all related posts
        $result = $db->select("{$prefix}posts", "*", [
            "post_type" => $post_type
        ]);

        // loop
        foreach ($result as $key => $value) {
            $db->delete("{$prefix}postmeta", [
                "post_id" => $value['ID']
            ]);
            echo "done deteting meta" . PHP_EOL;
        }

        // delete posts
        $db->delete("{$prefix}posts", [
            "post_type" => $post_type
        ]);
        echo "deleted all post types for {$post_type}" . PHP_EOL;
    } else {
        $post_type = "product";
        // get all related posts
        $result = $db->select("{$prefix}posts", "*", [
            "post_type" => $post_type
        ]);

        // loop
        foreach ($result as $key => $value) {
            $db->delete("{$prefix}postmeta", [
                "post_id" => $value['ID']
            ]);
            echo "done deteting meta" . PHP_EOL;
        }

        // delete posts
        $db->delete("{$prefix}posts", [
            "post_type" => $post_type
        ]);
        echo "deleted all post types for {$post_type}" . PHP_EOL;
    }
}