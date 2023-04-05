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
                $row['progressperc'], $row['rating10'], $row['coverlink'], $row['gr-link'], $row['id']);
        }
        return $books;
    }

    public function deleteBook(int $bookId): void
    {
        $sql = 'DELETE FROM `books`'
            . 'WHERE `id` = ' . $bookId . ';';


        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function updateBook(int $bookId, Book $new): void
    {
        $sql = 'UPDATE `books`'
            . ' SET `title` = :title'
            . ', `author` = :author'
            . ', `genre` = :genre'
            . ', `year` = :year'
            . ', `progressperc` = :progressperc'
            . ', `rating10` = :rating10'
            . ', `coverlink` = :coverlink'
            . ', `grLink` = :grLink'
            . ' WHERE `id` = :bookId ;';

        $values = [
            'title' => $new->getTitle(),
            'author' => $new->getAuthor(),
            'genre' => $new->getGenre(),
            'year' => $new->getYear(),
            'progressperc' => $new->getProgressPercent(),
            'rating10' => $new->getRating(),
            'coverlink' => $new->getCoverLink(),
            'grLink' => $new->getGrLink(),
            'id' => $bookId
        ];

        $query = $this->db->prepare($sql);
        $query->execute($values);
    }

    public function add(Book $book): int
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

    public function fetch(int $bookId): Book
    {
        $sql = 'SELECT `books`.`id`, `title`, `author`, `genre`, `year`, '
            . '`progressperc`, `rating10`, `coverlink`, `gr-link` '
            . 'FROM `books` '
            . 'WHERE `id` = :id; ';

        $values = [':id' => $bookId];

        $query = $this->db->prepare($sql);
        $query->execute($values);
        $row = $query->fetch();
        return new Book($row['title'], $row['author'], $row['genre'], $row['year'],
            $row['progressperc'], $row['rating10'], $row['coverlink'], $row['gr-link'], $row['id']);
    }
}

