<?php

namespace Service;

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Libraries\Config;

class DatabaseService
{
    /**
     * Create a doctrine entity manager.
     *
     * @return EntityManager
     */
    public static function create()
    {
        $appConfig = new Config();
        $dsnParser = new DsnParser();
        $connectionParams = $dsnParser->parse("pdo-mysql://{$appConfig->get('DB_USERNAME')}:{$appConfig->get('DB_PASSWORD')}@{$appConfig->get('DB_HOSTNAME')}/{$appConfig->get('DB_DATABASE')}");
        $isDevMode = true;

        $annotationDriver = new AnnotationDriver(new AnnotationReader(), [__DIR__ . '/../Entities']);

        $config = ORMSetup::createConfiguration($isDevMode);
        $config->setMetadataDriverImpl($annotationDriver);
        // obtaining the entity manager
        $connection = DriverManager::getConnection($connectionParams);
        return new EntityManager($connection, $config);
    }
}
