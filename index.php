<?php
$books = [
    [
        'name' => 'Do Androids of Electric Sheep',
        'author' => 'Pholip K. Dick',
        'releaseYear' => 1968,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'Project Hail Mary',
        'author' => 'Andy Weir',
        'releaseYear' => 2021,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'The Martian',
        'author' => 'Andy Weir',
        'releaseYear' => 2011,
        'purchaseUrl' => 'http://example.com'
    ]
];

function filter($items, $fn)
{
    $fillterdItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $fillterdItems[] = $item;
        }
    }

    return $fillterdItems;
};

$filteredBooks = array_filter($books, function ($book) {
    return $book['author'] === 'Andy Weir';
});

require "index.view.php";