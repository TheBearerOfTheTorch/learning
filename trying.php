<?php 

//checking if the this will work with the new variable method that ive learned

$file = $_SERVER['SCRIPT_FILENAME'];
$user = $_SERVER['HTTP_USER_AGENT'];
$server = $_SERVER['SERVER_SOFTWARE'];

//outputting the datials
echo $file,'<br>',$user,' <br>',$server;



