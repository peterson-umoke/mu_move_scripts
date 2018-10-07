<?php

// require the autoload file
require_once dirname(__FILE__) . "/vendor/autoload.php";

$where = [2, 3, 4, 5];
$product_types = ["simple"];

foreach ($years as $count => $i) {
    foreach ($product_types as $count => $product_type) {
        $prefix = "wp_{$i}_";
        $sql = "DELETE
            posts, term_relationships, term_taxonomy, terms
            FROM
                {$prefix}posts AS posts
            INNER JOIN {$prefix}term_relationships AS term_relationships ON posts.id = term_relationships.object_id
            INNER JOIN {$prefix}term_taxonomy AS term_taxonomy ON term_relationships.term_taxonomy_id = term_taxonomy.term_taxonomy_id
            INNER JOIN {$prefix}terms AS terms ON term_taxonomy.term_id = terms.term_id
            WHERE
                term_taxonomy.taxonomy = 'product_type'
            AND terms.slug = '{$product_type}'
            AND posts.post_type = 'product'";
        $db = new CustomDatabase();

        // check if the query ran successfully
        if ($db->query($sql)) {
            echo "done delete product types and its relevant information";
        }
    }
}