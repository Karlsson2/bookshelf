<?php

require __DIR__ . "/book-array-generated.php";
require __DIR__ . "/header.php";
require __DIR__ . "/functions.php";

$sorting = $_GET["sorting"] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
        }
    }
}

?>

<body>
    <div class="shelf">
        <?php foreach ($bookArray as $book) : ?>
            <div class="book book-<?= $book["color"] ?>">
                <?= $book["title"] ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <form action="index.php" method="GET">
            <button name="sorting" type="submit" value="alphabetically">Alphabetically</button>
            <button name="sorting" type="submit" value="size">Size</button>
            <button name="sorting" type="submit" value="color">Colour</button>

        </form>
    </div>
</body>

<?php
require __DIR__ . "/footer.php";
?>