<?php

$include = "invalid_file.php";
require($include);
$foo = $_GET['foo'];
$fooPost = $_POST['foo'];

echo $foo;
$bar = 'bar';
eval($bar);