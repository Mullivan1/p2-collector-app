<?php

require_once '../Book.php';

use PHPUnit\Framework\TestCase;

class TestBook extends TestCase
{
    public function testCreateBook()
    {
        $book = new Book('TitleTest', 'AuthorTest', 'GenreTest', 2023);
        $this->assertInstanceOf(Book::class, $book);
    }

    public function testSetRating()
    {
        $book = new Book('TitleTest', 'AuthorTest', 'GenreTest', 2023);
        $book->setRating(0);
        $actual = $book->getRating();
        $this->assertEquals(0, $actual);
    }
}
