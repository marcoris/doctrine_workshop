<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

function getEntityManager()
{
    $path = array("Entities");
    $isDevMode = true;

    $dbParams = array(
        "driver" => "pdo_mysql",
        "user" => "root",
        "password" => "root",
        "dbname" => "workshop",
    );

    $config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode, "Entities/Proxies");
    $config->setProxyNamespace("App\\Entities\\proxies");
    $config->setAutoGenerateProxyClasses($isDevMode);

    return EntityManager::create($dbParams, $config);
}