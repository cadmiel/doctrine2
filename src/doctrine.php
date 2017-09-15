<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


function GetEntityManager()
{
    $path = [
        __DIR__.'/Entity'
    ];

    $isDevMode = true;

    $dbParams = [
        'driver'     =>  'pdo_mysql',
        'user'       =>  'dbadmin',
        'password'   =>  'adminpw',
        'dbname'     =>  'doctrine',
        'host'       =>  'mysql'
    ];

    $config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode);

    $entityManager = EntityManager::create($dbParams,$config);

    //global  $entityManager;
    return $entityManager;
}


