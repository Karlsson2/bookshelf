<?php

require __DIR__ . "/book-array-generated.php";
require __DIR__ . "/header.php";
?>

<body>
    <div class="shelf">
        <?php foreach ($bookArray as $book) : ?>
            <div class="book book-<?= $book["color"] ?>
            book-width-<?= $book['page count'] < 300 ? 'small ' : ($book['page count'] < 600 ? 'medium ' : 'large ') ?>
            book-height-<?= strlen($book['title']) < 17 ? 'small ' : (strlen($book['title']) < 23 ? 'medium ' : 'large ') ?>">
                <?= $book["title"] ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <form action="index.php" method="POST">
            <button name="sorting" type="submit" value="alphabetically">Alphabetically</button>
            <button name="sorting" type="submit" value="size">Size</button>
            <button name="sorting" type="submit" value="color">Colour</button>

        </form>
    </div>
</body>

<?php
require __DIR__ . "/footer.php";
?>