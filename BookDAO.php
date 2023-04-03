<?php
require_once 'db-connect.php';
require_once 'Book.php';

class BookDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = connectToDb('project2');
    }

    public function fetchAll(): array
    {
        $sql = 'SELECT `books`.`id`, `title`, `authors`.`name`, `genres`.`genre`, `year`, '
            . '`progressperc`, `rating10`, `coverlink`, `gr-link` '
            . 'FROM `books`'
            . 'INNER JOIN `authors`'
            . 'ON `books`.`author` = `authors`.`id`'
            . 'INNER JOIN `genres`'
            . 'ON `books`.`genre` = `genres`.`id`;';
        $query = $this->db->prepare($sql);
        $query->execute();
        $rows = $query->fetchAll();

        $books = [];
        foreach ($rows as $row) {
            $book = new Book($row['title'], $row['name'], $row['genre'], $row['year'],
                $row['progressperc'], $row['rating10'], $row['coverlink'], $row['gr-link']);
            $books[] = $book;
        }

        return $books;
    }


}