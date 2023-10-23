<?php

require __DIR__ . "/book-array-generated.php";
require __DIR__ . "/header.php";
?>

<body>
    <div class="shelf">
        <?php foreach ($bookArray as $book) : ?>
            <div class="book">
            </div>
        <?php endforeach; ?>
    </div>
</body>

<?php
require __DIR__ . "/footer.php";
?>