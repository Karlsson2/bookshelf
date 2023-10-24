<?php

require __DIR__ . "/book-array-generated.php";
require __DIR__ . "/header.php";
require __DIR__ . "/functions.php";

$sorting = $_POST["sorting"] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($sorting)) {
        switch ($sorting) {
            case "alphabetically":
                $bookArray = sortAlphabetically($bookArray);
                break;
            case "size":
                $bookArray = sortBySize($bookArray);
                break;
            case "color":
                $bookArray = sortByColor($bookArray);
                break;
            case "author":
                $bookArray = sortByAuthor($bookArray);
                break;
            case "height":
                $bookArray = SortByLength($bookArray);
                break;
            case "genre":
                $bookArray = SortByGenre($bookArray);
        }
    }
}

?>

<body>
    <div class="buttons">
        <div class="search">
            <div class="search-title">Search the Bookshelf</div>
            <form action="index.php" method="POST">
                <input type="search" name="searching" placeholder="author, title....">
                <button type=submit>
                    <svg viewBox="0 0 1024 1024">
                        <path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="sort">
            <div class="sort-title">Sort by</div>
            <form action="index.php" method="POST">
                <button name="sorting" type="submit" value="alphabetically">Alphabetically</button>
                <button name="sorting" type="submit" value="size">Size</button>
                <button name="sorting" type="submit" value="color">Colour</button>
                <button name="sorting" type="submit" value="author">Author</button>
                <button name="sorting" type="submit" value="height">Height</button>
                <button name="sorting" type="submit" value="genre">Genre</button>
            </form>
        </div>
    </div>
    <div class="shelf">
        <?php foreach ($bookArray as $book) : ?>

            <div class="book book-<?= $book["color"] ?>
            book-width-<?= $book['page count'] < 300 ? 'small ' : ($book['page count'] < 600 ? 'medium ' : 'large ') ?>
            book-height-<?= strlen($book['title']) < 17 ? 'small ' : (strlen($book['title']) < 23 ? 'medium ' : 'large ') ?>">
                <div class="icon"><?= getGenreIcon($book["genre"]) ?></div>
                <div class="book-title <?= getGenre($book['genre']); ?>">
                    <div class="title-text"><?= $book["title"] ?></div>
                </div>
                <div class="book-author book-author-<?= $book["color"] ?>"><?= getInitials($book["author"]) ?></div>


            </div>
        <?php endforeach; ?>
    </div>

</body>

<?php
require __DIR__ . "/footer.php";
?>