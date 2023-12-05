<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$db = new Database();

$post = $db->query('select * from posts where id = 1')->fetch(PDO::FETCH_ASSOC);;

dd($post);