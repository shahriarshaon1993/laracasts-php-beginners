<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    view('session/create.view.php', [
        'errors' => $form->errors()
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
