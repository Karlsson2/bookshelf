<?php

declare(strict_types=1);
require __DIR__ . '/book-array-generated.php';

function getInitials(string $fullName): string
{
    $nameArray = explode(" ", $fullName, 2);
    $fullName = substr($nameArray[0], 0, 1) . "." . substr($nameArray[1], 0, 1);
    return $fullName;
}

function getGenreIcon(string $genre): string
{
    switch ($genre) {
        case "Horror":
            return '<i class="fa-solid fa-skull"></i>';
            break;
        case "Romance":
            return '<i class="fa-solid fa-heart"></i>';
            break;
        case "Thriller":
            return '<i class="fa-solid fa-gun"></i>';
            break;
        case "Science Fiction":
            return '<i class="fa-brands fa-space-awesome"></i>';
            break;
        case "Crime":
            return '<i class="fa-solid fa-fingerprint"></i>';
            break;
        case "Non-Fiction":
            return '<i class="fa-solid fa-user"></i>';
            break;
        case "Fantasy":
            return '<i class="fa-solid fa-wand-sparkles"></i>';
    }
}

function getGenre(string $bookGenre): string
{
    switch ($bookGenre) {
        case 'Science Fiction':
            return 'genre-scifi';
            break;
        case 'Fantasy':
            return 'genre-fantasy';
            break;
        case 'Romance':
            return 'genre-romance';
            break;
        case 'Thriller':
            return 'genre-thriller';
            break;
        case 'Horror':
            return 'genre-horror';
            break;
        case 'Non-Fiction':
            return 'genre-nonfic';
            break;
        case 'Crime':
            return 'genre-crime';
            break;
    }
}
// function to change the authors into their surnames so they can be sorted via surname instead of firstname
function explodeAndSort(string $string)
{
    $newString = explode(" ", $string);
    return $newString[1];
}
function multiSort(array $arrayToBeSorted, array $sortingArguments): array
{
    $sortColumns = [];
    //refactored all the sorting functions to this one function, edgecase necessary for sorting by "length" as its 
    //"custom" and not actually sorting by the title but the string length.
    foreach ($sortingArguments as $sortArg) {

        if ($sortArg === 'height') {
            // Sorting by the length of the "title" column for the "length" sorting
            $sortColumns[] = array_map('strlen', array_column($arrayToBeSorted, 'title'));
        } elseif ($sortArg === "author") {

            // sort authors with surname, grab the surname from the fullname string author with explodeAndSort.

            $sortColumns[] = array_map('explodeAndSort', array_column($arrayToBeSorted, 'author'));
        } else {
            // Sorting by other specified columns supplied by the user.
            $column = array_column($arrayToBeSorted, $sortArg);
            $sortColumns[] = $column;
        }
    }
    // adding the array to be sorted as the last argument of the array to be passed into array_multisort
    $sortColumns[] = &$arrayToBeSorted;

    //"exploding" the array with the array_columns and $arrayToBeSorted as the last argument being passed into multisort
    array_multisort(...$sortColumns);

    return $arrayToBeSorted;
}

function getSearchResults(array $book): string
{
    $searchString = strtolower(trim(htmlspecialchars($_POST['searching']), " "));
    $title = strtolower($book['title']);
    $author = strtolower($book['author']);
    $genre = strtolower($book['genre']);

    if (stripos($title, $searchString) !== false || stripos($author, $searchString) !== false || stripos($genre, $searchString) !== false) {
        return $book['color'];
    } else {
        return 'unselected';
    }
}

function connect()
{
    return $db = new PDO("sqlite:" . __DIR__ . "/books.db");
}


function getAllBooks(): array
{
    $db = connect();
    $query = $db->query("SELECT * FROM books");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getFirstBook(): array
{
    $db = connect();
    $query = $db->query("SELECT * FROM books LIMIT 1");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
