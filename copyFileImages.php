<?php

require_once dirname(__FILE__) . "/vendor/autoload.php";

$file = new CustomFileSystem();
$init_counter = 2;
$final_counter = 14;
$years = [2017, 2018];

// start the loop for the entire copy file
for ($i = $init_counter; $i <= $final_counter; $i++) {
    // copy files and images
    foreach ($years as $count => $x) {
        $source = dirname(__FILE__) . "/../wp-content/uploads/{$x}";
        $dest = dirname(__FILE__) . "/../wp-content/uploads/sites/{$i}/{$x}";

        $file->copyFilesFolders($source, $dest);
    }
}