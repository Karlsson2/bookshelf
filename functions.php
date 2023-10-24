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
function sortByLength(array $sortingArray): array
{
    usort($sortingArray, function ($a, $b) {
        return strlen($a["title"]) - strlen($b["title"]);
    });

    return $sortingArray;
}
function sortByGenre(array $sortingArray): array
{
    $key_values = array_column($sortingArray, 'genre');
    array_multisort($key_values, SORT_ASC, $sortingArray);
    return $sortingArray;
}
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
            break;
    }
}
