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
function searchArray(array $searchArray, string $searchString)
{
    foreach ($searchArray as $array) {
        if ($array["title"] == $searchString || $array["author"] == $searchString) {
            return $array;
        } else {
            return false;
        }
    }
}
