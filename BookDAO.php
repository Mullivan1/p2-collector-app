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
            $books[] = new Book($row['title'], $row['name'], $row['genre'], $row['year'],
                $row['progressperc'], $row['rating10'], $row['coverlink'], $row['gr-link']);
        }
        return $books;
    }

    public function add(Book $book):int
    {
        $sql = 'INSERT INTO `books` (`title`, `author`, `genre`, `year`, '
            . '`progressperc`, `rating10`, `coverlink`, `gr-link`) '
            . 'VALUES (:title, :author, :genre, :year, :progressperc, :rating10, :coverlink, :grLink) ';

        $values = [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'genre' => $book->getGenre(),
            'year' => $book->getYear(),
            'progressperc' => $book->getProgressPercent(),
            'rating10' => $book->getRating(),
            'coverlink' => $book->getCoverLink(),
            'grLink' => $book->getGrLink()
        ];

        $query = $this->db->prepare($sql);
        $query->execute($values);

        return $this->db->lastInsertId(); // Request the ID used and return
    }

    public function listOfAuthorsAndId(): array
    {
        $sql = 'SELECT `authors`.`id`, `name`'
            . 'FROM `authors`;';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function listOfGenresAndId(): array
    {
        $sql = 'SELECT `genres`.`id`, `genre`'
            . 'FROM `genres`;';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


}