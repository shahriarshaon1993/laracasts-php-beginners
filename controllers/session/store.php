<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide valid password';
}

if (!empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
            'name' => $user['name']
        ]);

        header('location: /');
        exit();
    }
}

view('session/create.view.php', [
    'errors' => [
        'failed' => 'No matching account found for that email address and password.'
    ]
]);
