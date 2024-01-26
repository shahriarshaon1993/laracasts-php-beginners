<?php

$_SESSION['name'] = '123';

view("index.view.php", [
    'heading' => 'Home'
]);
