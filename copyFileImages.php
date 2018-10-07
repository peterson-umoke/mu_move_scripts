<?php

require_once dirname(__FILE__) . "/vendor/autoload.php";

$file = new CustomFileSystem();
$init_counter = 2;
$final_counter = 5;

// start the loop for the entire copy file
for ($i = $init_counter; $i <= $final_counter; $i++) {
    // copy files and images
    $year = 2018;
    $source = dirname(__FILE__) . "/../wp-content/uploads/{$year}";
    $dest = dirname(__FILE__) . "/../wp-content/uploads/sites/{$i}/{$year}";

    $file->copyFilesFolders($source, $dest);
}