<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::string($name, 3, 255)) {
    $errors['name'] = 'Please provide a password at least 3 characters';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password at least 7 characters';
}

if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$result = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($result) {
    redirect('/');
} else {
    $db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    (new Authenticator)->login([
        'email' => $email,
        'name' => $name
    ]);

    redirect('/');
}
