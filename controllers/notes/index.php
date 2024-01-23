<?php

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$heading = "My Notes";

$notes = $db->query('select * from notes where user_id = 3')->get();

require "views/notes/index.view.php";