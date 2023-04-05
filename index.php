<?php
require_once 'BookDAO.php';
require_once 'AuthorDAO.php';
require_once 'GenreDAO.php';
require_once 'displayFunction.php';

$bookDAO = new BookDAO();
$authorDAO = new AuthorDAO();
$genreDAO = new GenreDAO();

//print_r($_POST);
if (isset($_POST['title'])) {
    try {
        $new = new Book(
            is_string($_POST['title']) ? $_POST['title'] : false,
            is_int($_POST['author']) ? $_POST['author'] : false,
            is_int($_POST['genre']) ? $_POST['genre'] : false,
            is_int($_POST['year']) ? $_POST['year'] : false,
            is_int($_POST['progressperc']) ? $_POST['progressperc'] : false,
            is_int($_POST['rating10']) ? $_POST['rating10'] : false,
            sanitiseUrl($_POST['coverlink']),
            sanitiseUrl($_POST['gr-link'])
        );
        $bookDAO->add($new);
    } catch (Exception $e) {
        echo "There was an error with your inputs";
    }
}

if (isset($_POST['deleteid'])) {
    $bookDAO->deleteBook($_POST['deleteid']);
}

if (isset($_POST['editid'])) {
    try {
        $newedit = new Book(
            is_string($_POST['title']) ? $_POST['title'] : false,
            is_int($_POST['author']) ? $_POST['author'] : false,
            is_int($_POST['genre']) ? $_POST['genre'] : false,
            is_int($_POST['year']) ? $_POST['year'] : false,
            is_int($_POST['progressperc']) ? $_POST['progressperc'] : false,
            is_int($_POST['rating10']) ? $_POST['rating10'] : false,
            sanitiseUrl($_POST['coverlink']),
            sanitiseUrl($_POST['gr-link'])
        );
        $bookDAO->updateBook($_POST['editid'], $newedit);
    } catch (Exception $e) {
        echo "There was an error with your inputs";
    }
}


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
    foreach ($books as $book) {
        echo createTile($book);
    }
?>
    <div class="book" id="addition">
        <form action="index.php" method="post">
            <h2>Add a new book!</h2>
            <label for="title">Title: (Required)</label>
            <input type="text" id="title" name="title" value="test" required><br>
            <label for="author">Author: (Required)</label>
            <select type="text" name="author" id="author" required>
            <?php
            $authors = $authorDAO->listOfAuthorsAndId();
            foreach ($authors as $author) {
                echo '<option value="'.$author['id'].'">'.$author['name'].'</option>';
            }
            ?>
            </select>
            <br>
            <label for="year">Year: (Required)</label>
            <input type="number" id="year" name="year" required><br>

            <label for="genre">Genre: </label>
            <select name="genre" id="genre" required>
                <?php
                $genres = $genreDAO->listOfGenresAndId();
                foreach ($genres as $genre) {
                    echo '<option value="'.$genre['id'].'">'.$genre['genre'].'</option>';
                }
                ?>
            </select>
            <br>
            <label for="progressperc">Progress percentage: </label>
            <input type="text" id="progressperc" name="progressperc"><br>
            <label for="rating10">Rating /10: (Required)</label>
            <input type="range" min="1" max="10" value="5" class="slider" id="range" name="rating10" required>

            <br>
            <label for="coverlink">Link for cover image: </label>
            <input type="text" id="coverlink" name="coverlink"><br>
            <label for="gr-link">Link to goodreads: </label>
            <input type="text" id="gr-link" name="gr-link"><br>
            <input type="submit" id="submit" value="Add to Collection" >
        </form>
    </div>


</div>



</body>
</html>
