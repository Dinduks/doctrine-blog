<?php

// initialiser Doctrine
use Doctrine\ORM\Tools\Setup;
require_once 'Doctrine/ORM/Tools/Setup.php';
Setup::registerAutoloadPEAR();

// configuration des annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    array(__DIR__ . '/../entities', $isDevMode)
);

// configuration de la connexion
$connection = array(
    'driver'   => 'pdo_mysql',
    'path'     => '127.0.0.1',
    'dbname'   => 'cours_doctrine',
    'user'     => 'cours_doctrine',
    'password' => 'cours_doctrine_pwd',
);

$em = \Doctrine\ORM\EntityManager::create($connection, $config);

session_start();