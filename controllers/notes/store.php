<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$errors = [];

if (!Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = 'A body of no more than 100 characters is required.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 3,
]);

header('location: /notes');
die();
