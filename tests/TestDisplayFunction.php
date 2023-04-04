<?php
require_once '../Book.php';
require_once '../displayFunction.php';

use PHPUnit\Framework\TestCase;

class TestDisplayFunction extends TestCase
{
    public function testCreateString()
    {
        $book = new Book('TitleTest', 'AuthorTest', 'GenreTest', 2023);
    }
}