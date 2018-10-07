<?php

// require the autoload file
require_once dirname(__FILE__) . "/vendor/autoload.php";

$prefix = "wp_3_";
$product_type = "simple";
$xample = "DELETE
posts, term_relationships, term_taxonomy, terms
FROM
    wp_2_posts AS posts
INNER JOIN wp_2_term_relationships AS term_relationships ON posts.id = term_relationships.object_id
INNER JOIN wp_2_term_taxonomy AS term_taxonomy ON term_relationships.term_taxonomy_id = term_taxonomy.term_taxonomy_id
INNER JOIN wp_2_terms AS terms ON term_taxonomy.term_id = terms.term_id
WHERE
    term_taxonomy.taxonomy = 'product_type'
AND terms.slug = 'gidi_hotel_rooms'
AND posts.post_type = 'product'";
$sql = "SELECT
    *
FROM
    {$prefix}posts AS posts
INNER JOIN {$prefix}term_relationships AS term_relationships ON posts.ID = term_relationships.object_id
INNER JOIN {$prefix}term_taxonomy AS term_taxonomy ON term_relationships.term_taxonomy_id = term_taxonomy.term_taxonomy_id
INNER JOIN {$prefix}terms AS terms ON term_taxonomy.term_id = terms.term_id
WHERE
    term_taxonomy.taxonomy = 'product_type'
AND terms.slug = '{$product_type}'
AND posts.post_type = 'product'";
$db = new CustomDatabase();
$res = $db->query($sql)->fetchAll();

print_r($res);

// foreach ($res as $key => $val) {
//     // $db->delete()
// }