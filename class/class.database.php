<?php

use Medoo\Medoo;

class CustomDatabase extends Medoo
{
    public function __construct()
    {
        parent::__construct([
            'database_type' => 'mysql',
            'database_name' => DATABASE_NAME,
            'server' => DATABASE_HOST,
            'username' => DATABASE_USERNAME,
            'password' => DATABASE_PASSWORD
        ]);
    }
}