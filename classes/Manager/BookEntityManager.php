<?php

namespace Manager;


class BookEntityManager
{
    private $db;

    public function __construct(\PDO $db)
    {
        //print 'Constructeur appelé!';
        $this->db = $db;
    }

    public function addBook(\Entity\BookEntity $book)
    {
        // système de vérification typologie variables amélioré avec php7, limitation avec php5 --> Type Hinting limité aux array et aux instances de classe (les types scalaires int et string ne sont pas gérés)
        d($book);

        $query = $this->db->prepare('INSERT INTO book (title, author, description) VALUES (:title, :author, :description)');
        $query->bindValue(':title', $book->getTitle());
        $query->bindValue(':author', $book->getAuthor());
        $query->bindValue(':description', $book->getDescription());
        $executed = $query->execute();
        $errors = $this->db->errorInfo();
        d($errors);
        d($executed);
    }

    public function getBook($id) {

    }

    public function getBooks(array $id) {

    }
}