<?php

// require the autoload file
require_once dirname(__FILE__) . "/vendor/autoload.php";

// init the database connection
$db = new CustomDatabase();
$init_counter = 2;
$final_counter = 14;

// init a loop counter
for ($i = $init_counter; $i <= $final_counter; $i++) {

    // drop tables
    $tables_drop .= "wp_{$i}_posts";
    $tables_drop .= ",wp_{$i}_postmeta";
    $tables_drop .= ",wp_{$i}_termmeta";
    $tables_drop .= ",wp_{$i}_terms";
    $tables_drop .= ",wp_{$i}_term_relationships";
    $tables_drop .= ",wp_{$i}_term_taxonomy";

    // copy tables
    $copy_tables .= "CREATE TABLE wp_{$i}_posts SELECT * FROM wp_posts";
    $copy_tables .= ";CREATE TABLE wp_{$i}_postmeta SELECT * FROM wp_postmeta";
    $copy_tables .= ";CREATE TABLE wp_{$i}_termmeta SELECT * FROM wp_termmeta";
    $copy_tables .= ";CREATE TABLE wp_{$i}_terms SELECT * FROM wp_terms";
    $copy_tables .= ";CREATE TABLE wp_{$i}_term_relationships SELECT * FROM wp_term_relationships";
    $copy_tables .= ";CREATE TABLE wp_{$i}_term_taxonomy SELECT * FROM wp_term_taxonomy";

    if ($i !== $final_counter) {
        $tables_drop .= ",";
        $copy_tables .= ";";
    }
}

$query = "DROP TABLE IF EXISTS {$tables_drop}";
if ($db->query($query)) {
    echo "drop all tables" . PHP_EOL;
}

// copy tables
if ($db->query($copy_tables)) {
    echo "done copy tables" . PHP_EOL;
}