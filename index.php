<?php
require __DIR__ . "/header.php";
require __DIR__ . "/functions.php";

$bookArray = getAllBooks();
$sorting = $_POST["selected_values"] ?? null;
$searching = $_POST["searching"] ?? null;




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($sorting)) {
        $bookArray = multiSort($bookArray, $sorting);
    }
}
?>

<body>
    <div class="buttons">
        <div class="search">
            <div class="search-title">Search the Bookshelf</div>
            <form action="index.php" method="POST">
                <input type="search" name="searching" placeholder="author, title, genre....">
                <button type=submit>
                    <svg viewBox="0 0 1024 1024">
                        <path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="sort">
            <div class="sort-title">Sort by</div>
            <form name="sort" action="index.php" method="POST">


                <button class="sorting alphabetical-sort" name="sorting" type="button" onclick="handleButtonClick('title')">Alphabetically</button>
                <button class="sorting length-sort" name="sorting" type="button" onclick="handleButtonClick('page_count')">Length</button>
                <button class="sorting color-sort" name="sorting" type="button" onclick="handleButtonClick('color')">Colour</button>
                <button class="sorting author-sort" name="sorting" type="button" onclick="handleButtonClick('author')">Author</button>
                <button class="sorting genre-sort" name="sorting" type="button" onclick="handleButtonClick('genre')">Genre</button>
                <button class="sorting height-sort" name="sorting" type="button" onclick="handleButtonClick('height')">Height</button>
                <button class="submit" type="submit">Sort!</button>
            </form>

        </div>
    </div>
    <div class="shelf">
        <?php foreach ($bookArray as $book) : ?>
            <div class="book book-<?= !isset($_POST['searching']) ? $book["color"] : getSearchResults($book) ?>
            book-width-<?= $book['page_count'] < 300 ? 'small ' : ($book['page_count'] < 600 ? 'medium ' : 'large ') ?>
            book-height-<?= strlen($book['title']) < 17 ? 'small ' : (strlen($book['title']) < 23 ? 'medium ' : 'large ') ?>">
                <div class="icon"><?= getGenreIcon($book["genre"]) ?></div>
                <div class="book-title <?= getGenre($book['genre']); ?>">
                    <div class="title-text"><?= $book["title"] ?></div>
                </div>
                <div class="book-author book-author-<?= !isset($_POST['searching']) ? $book["color"] : getSearchResults($book) ?>"><?= getInitials($book["author"]) ?></div>

            </div>
        <?php endforeach; ?>
    </div>
    <script>
        function handleButtonClick(value) {
            var form = document.forms["sort"];
            var existingInput = null;

            // Check if an input with the same name and value already exists
            for (var i = 0; i < form.elements.length; i++) {
                var element = form.elements[i];
                if (element.type === "hidden" && element.name === "selected_values[]" && element.value === value) {
                    existingInput = element;
                    break; // Exit the loop once a match is found
                }
            }

            if (existingInput) {
                // If a matching input is found, remove it
                existingInput.parentNode.removeChild(existingInput);
            } else {
                // If no matching input is found, create and append a new one
                var hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "selected_values[]";
                hiddenInput.value = value;
                form.appendChild(hiddenInput);
            }
        }
        // add eventlisteners to each of the buttons when they are pressed so that the user can see which sorting 
        //options they have selected.
        const sortingItems = document.querySelectorAll('.sorting');
        let isFirstClick = true;

        sortingItems.forEach((sortingItem) => {
            sortingItem.addEventListener('click', function() {

                if (isFirstClick) {
                    this.classList.add("clicked");
                    this.classList.add("first-clicked");
                    isFirstClick = false;
                } else {
                    this.classList.toggle("clicked");
                }
            });
        });
    </script>
</body>

<?php
require __DIR__ . "/footer.php";
?>