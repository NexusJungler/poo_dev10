<?php

namespace Factory;
/*
require 'Database.php';
require 'BookEntity.php';
require 'BookEntityManager.php';
*/

class EntityFactory
{
    public static function get($entity_type) {
        $db = \Core\Database::getConnection('PDO');
        // On évite de faire un switch!
        $man_class = '\Manager\\' . ucfirst($entity_type) . 'EntityManager';
        $ent_class = '\Entity\\' . ucfirst($entity_type) . 'Entity';

        if(class_exists($ent_class)) {
            $manager = new $man_class($db);
            $entity = new $ent_class($manager);
            return $entity;
        } else {
            throw new \Exception("Mauvais type d'entité donnée à la factory");
            var_dump($ent_class);
        }
    }
}