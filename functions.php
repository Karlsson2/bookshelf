<?php

declare(strict_types=1);

function sortAlphabetically(array $sortingArray): array
{
    $key_values = array_column($sortingArray, 'title');
    array_multisort($key_values, SORT_ASC, $sortingArray);
    return $sortingArray;
}
function sortByAuthor(array $sortingArray): array
{
    $key_values = array_column($sortingArray, 'author');
    array_multisort($key_values, SORT_ASC, $sortingArray);
    return $sortingArray;
}
function sortByColor(array $sortingArray): array
{
    $key_values = array_column($sortingArray, 'color');
    array_multisort($key_values, SORT_ASC, $sortingArray);
    return $sortingArray;
}
function sortBySize(array $sortingArray): array
{
    $key_values = array_column($sortingArray, 'page count');
    array_multisort($key_values, SORT_ASC, $sortingArray);
    return $sortingArray;
}
function getInitials(string $fullName): string
{
    $nameArray = explode(" ", $fullName, 2);
    $fullName = substr($nameArray[0], 0, 1) . "." . substr($nameArray[1], 0, 1);
    return $fullName;
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
