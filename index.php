<?php
require_once 'BookDAO.php';

$bookDAO = new BookDAO();

$books = $bookDAO->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book Collection</title>

    <meta name="description" content="Project 2 collection app displaying my book collection">
    <meta name="author" content="Michael Sullivan">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />

    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">

</head>

<body>

<h1>Book Collection</h1>


<div class="collection">
<?php
    $html = '';
    foreach ($books as $book) {
        $html = '<div class="book">'
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
        echo $html;
    }
?>


</div>

</body>
</html>
