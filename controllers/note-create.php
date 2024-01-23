<?php

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 3
    ]);
}

require "views/notes-create.view.php";