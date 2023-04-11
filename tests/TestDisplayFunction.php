<?php
require_once '../Book.php';
require_once '../displayFunction.php';

use PHPUnit\Framework\TestCase;

class TestDisplayFunction extends TestCase
{
    public function testCreateString()
    {
        $book = new Book('TitleTest', 'AuthorTest', 'GenreTest', 2023);
        $expected = '<div class="book"><img class="book-image" src="" alt="Book Cover for TitleTest"><div class="book-head-container"><p class="book-head title" >TitleTest</p><p class="book-head align-right" >2023</p><p class="book-head" >AuthorTest</p><p class="book-head align-right" >GenreTest</p></div ><hr class="book-hr" ><div class="book-details-container" ><p class="book-detail"></p><p class="book-detail"></p><p class="book-detail"></p></div><hr class="book-hr" ><div class="buttons"><form action="edit.php" method="post"><input type="submit" title="Edit" value="Edit" class="alter" name="edit"><input type="hidden" value="-1" name="editid"></form><form action="index.php" method="post"><input type="submit" title="Delete" value="Delete" class="alter" name="delete"><input type="hidden" value="-1" name="deleteid"></form></div></div>';
        $actual = createTile($book);
        $this->assertEquals($expected, $actual);
    }
}