<?php

declare(strict_types=1);

function generateBooks(int $numberOfBooks): array
{
    $names = [
        'Joh' => 'nifer',
        'Mar' => 'ie',
        'Rob' => 'mah',
        'Pat' => 'itha',
        'Mic' => 'antha',
        'Dan' => 'ric',
        'Lis' => 'is',
        'Kat' => 'man',
        'Wil' => 'rah',
        'Sam' => 'icz',
        'Eli' => 'in',
        'Ben' => 'drzej',
        'Sar' => 'my',
        'Nat' => 'cio',
        'Pat' => 'lev',
        'Kev' => 'ael',
        'Rya' => 'lie',
        'Jen' => 'chi',
        'Tho' => 'chan',
        'Geo' => 'liam',
    ];

    $surnames = [
        'Smo' => 'ith',
        'John' => 'son',
        'Will' => 'iams',
        'Jon' => 'eva',
        'Dav' => 'is',
        'Marcz' => 'tino',
        'Thom' => 'oson',
        'Iva' => 'nov',
        'Li' => 'ben',
        'Niel' => 'sen',
        'Lar' => 'sova',
        'Kova' => 'lev',
        'Huss' => 'eini',
        'Chen' => 'oro',
        'Gun' => 'dark',
        'Kova' => 'lev',
        'Møll' => 'er',
        'Smir' => 'nov',
        'Zhang' => 'ling',
        'Vande' => '-Merwe',
        'Both' => 'an',
        'Hans' => ' ben-Eren',
        'Lar' => 'sson',
        'Ande' => 'won',
        'Patel' => 'aran',
        'Hu' => 'liu',
        'Ahm' => 'ed',
        'Wu' => 'tan',
        'Sund' => 'ström',
        'Orl' => 'ini',
        'Singh' => 'tiwa',
    ];

    $genres = [
        'Science Fiction',
        'Fantasy',
        'Romance',
        'Thriller',
        'Horror',
        'Non-Fiction',
        'Crime'
    ];

    $titles = [
        ['the', 'another', 'a second', 'my', 'your', 'her', 'his', 'our', 'their', 'inside the', 'under the'],
        ['eerie', 'chilling', 'bloody', 'macabre', 'passionate', 'enchanting', 'tender', 'intimate', 'amorous', 'otherworldly', 'mystical', 'ineffable', 'alien', 'opulent', 'sumptuous', 'elegant', 'ponderous', 'refined'],
        ['castle', 'cup', 'raven', 'court', 'case', 'lover', 'orc', 'existence', 'seduction', 'grind', 'walk', 'hour', 'song', 'business', 'affair', 'master', 'gardener', 'butcher', 'library', 'cult', 'circle', 'denizen', 'innocence']
    ];

    $colors = [
        'red', 'blue', 'grey', 'black', 'green', 'magenta', 'white', 'black', 'pink'
    ];

    $nameKeys = array_keys($names);
    $surKeys = array_keys($surnames);
    $nameVals = array_values($names);
    $surVals = array_values($surnames);

    for ($i = 0; $i < $numberOfBooks; $i++) {
        $author = sprintf(
            '%s%s %s%s',
            $nameKeys[array_rand($nameKeys)],
            $nameVals[array_rand($nameVals)],
            $surKeys[array_rand($surKeys)],
            $surVals[array_rand($surVals)]
        );

        $titleWordOneCount = count($titles[0]);
        $titleWordTwoCount = count($titles[1]);
        $titleWordThreeCount = count($titles[2]);

        $title = sprintf(
            '%s %s %s',
            ucwords($titles[0][mt_rand(0, $titleWordOneCount - 1)]),
            ucwords($titles[1][mt_rand(0, $titleWordTwoCount - 1)]),
            ucwords($titles[2][mt_rand(0, $titleWordThreeCount - 1)])
        );

        $books[$i]['author'] = $author;
        $books[$i]['title'] = $title;
        $books[$i]['ISBN'] = mt_rand(1000000000000, 1900000000000);
        $books[$i]['genre'] = $genres[array_rand($genres)];
        $books[$i]['page count'] = mt_rand(150, 950);
        $books[$i]['color'] = $colors[array_rand($colors)];
    }
    return $books;
}
