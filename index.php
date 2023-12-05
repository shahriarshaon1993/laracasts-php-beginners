<?php

require 'functions.php';
// require 'router.php';

// Contect to our MySql Database

$dsn = "mysql:host=localhost;port=3307;dbname=myapp;user=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare('select * from posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}