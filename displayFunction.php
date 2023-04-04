<?php
/**
 * @param $book - Takes a book object
 * @return string - Returns string to create a tile with book information
 */
function createTile ($book): string
{
    return '<div class="book">'
        . '<img class="book-image" src="' . $book->getCoverLink() . '" alt="Book Cover for ' . $book->getTitle() . '">'
        . '<div class="book-head-container">'
        . '<p class="book-head title" >' . $book->getTitle() . '</p>'
        . '<p class="book-head align-right" >' . $book->getYear() . '</p>'
        . '<p class="book-head" >' . $book->getAuthor() . '</p>'
        . '<p class="book-head align-right" >' . $book->getGenre() . '</p>'
        . '</div >'
        . '<hr class="book-hr" >'
        . '<div class="book-details-container" >'
        . '<p class="book-detail" >Progress: ' . $book->getProgressPercent() . '%</p>'
        . '<p class="book-detail" >Rating: ' . $book->getRating() . '/10</p>'
        . '<a href="' . $book->getGrLink() . ' "target="_blank" class="book-detail">More... <i class="fa-solid fa-book"></i></a>'
        . '</div>'
        . '</div>';
}