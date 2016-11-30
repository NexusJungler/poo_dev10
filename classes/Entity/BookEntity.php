<?php

namespace Entity;


class BookEntity
{
    private $id;
    private $title;
    private $author;
    private $description;

    protected $manager;

    public function __construct(BookEntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $title = htmlentities($title);
        if(strlen($title) <= 30) {
            $this->title = $title;
        }
        else {
            throw new Exception('le titre ne peut pas dépasser 50 caractères.');
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getDescription()
    {

        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function save() {
        d(Database::$mavariable);
        d($this->manager);
        //$this->manager->addBook($this);
    }

    public static function static_load($id) {
        // problème, $manager n'a pas de valeur statique!
        if(is_numeric($id)) {
            self::$manager->getBook($id);
        } else if (is_array($id)) {
            self::$manager->getBooks($id);
        } else {
            throw new Exception('Mauvais format de données pour la méthode load.');
        }
    }

    public function load($id) {
        if(is_numeric($id)) {
            $this->manager->getBook($id);
        } else if (is_array($id)) {
            $this->manager->getBooks($id);
        } else {
            throw new Exception('Mauvais format de données pour la méthode load.');
        }

    }

    public function delete() {

    }
    public static function create() {

    }

}