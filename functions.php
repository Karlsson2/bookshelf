<?php

declare(strict_types=1);

function getInitials(string $fullName): string
{
    $nameArray = explode(" ", $fullName, 2);
    $fullName = substr($nameArray[0], 0, 1) . "." . substr($nameArray[1], 0, 1);
    return $fullName;
}

function getGenreIcon(string $genre)
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

function multiSort(array $arrayToBeSorted, array $sortingArguments): array
{
    $sortColumns = [];

    foreach ($sortingArguments as $sortArg) {
        if ($sortArg === 'height') {
            // Sorting by the length of the "title" column
            $sortColumns[] = array_map('strlen', array_column($arrayToBeSorted, 'title'));
        } else {
            // Sorting by other specified columns
            $column = array_column($arrayToBeSorted, $sortArg);
            $sortColumns[] = $column;
        }
    }

    $sortColumns[] = &$arrayToBeSorted;


    array_multisort(...$sortColumns);

    return $arrayToBeSorted;
}
