<?php
require_once 'BookDAO.php';
require_once 'AuthorDAO.php';
require_once 'GenreDAO.php';
require_once 'displayFunction.php';

$bookDAO = new BookDAO();
$authorDAO = new AuthorDAO();
$genreDAO = new GenreDAO();

if (isset($_POST['editid'])) {
    $old = $bookDAO->fetch($_POST['editid']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Entry</title>

    <meta name="description" content="Edit an entry">
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
   <div class="book" id="addition">
        <form action="index.php" method="post">
            <h2>Update a book!</h2>
            <label for="title">Title: (Required)</label>
            <input type="text" id="title" name="title" value="<?php echo $old->getTitle() ?>" required><br>
            <label for="author">Author: (Required)</label>
            <select type="text" name="author" id="author" required>
            <?php
            $authors = $authorDAO->listOfAuthorsAndId();
            foreach ($authors as $author) {
                if ($author['id'] !== (int)$old->getAuthor()) {
                    echo '<option value="' . $author['id'] . '">' . $author['name'] . '</option>';
                } else {
                    echo '<option selected value="' . $author['id'] . '">' . $author['name'] . '</option>';
                }
            }
            ?>
            </select>
            <br>
            <label for="year">Year: (Required)</label>
            <input type="number" id="year" name="year" value="<?php echo $old->getYear() ?>" required><br>

            <label for="genre">Genre: </label>
            <select name="genre" id="genre" required>
                <?php
                $genres = $genreDAO->listOfGenresAndId();
                foreach ($genres as $genre) {
                    if ($genre['id'] !== (int)$old->getGenre()) {
                        echo '<option value="' . $genre['id'] . '">' . $genre['genre'] . '</option>';
                    } else {
                        echo '<option selected value="' . $genre['id'] . '">' . $genre['genre'] . '</option>';
                    }
                }
                ?>
            </select>
            <br>
            <label for="progressperc">Progress percentage: </label>
            <input type="text" id="progressperc" value="<?php echo $old->getProgressPercent() ?>" name="progressperc"><br>
            <label for="rating10">Rating /10: (Required)</label>
            <input type="range" min="1" max="10" value="<?php echo $old->getRating() ?>" class="slider" id="range" name="rating10" required>

            <br>
            <label for="coverlink">Link for cover image: </label>
            <input type="text" id="coverlink" value="<?php echo $old->getCoverLink() ?>" name="coverlink"><br>
            <label for="gr-link">Link to goodreads: </label>
            <input type="text" id="gr-link" value="<?php echo $old->getGrLink() ?>" name="gr-link"><br>
            <input type="submit" id="submit" value="Update" >
            <input type="hidden" value="<?php echo $old->getId() ?>" name="editid">
        </form>
    </div>
</div>

</body>
</html>