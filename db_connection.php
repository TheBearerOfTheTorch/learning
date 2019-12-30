<?php


    //definning the db detials  / this can also have its own file for security reasons
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_NAME','learning');
    DEFINE('DB_PASSWORD','');
    DEFINE('DB_USER','root');

    //getting the db connection
    $dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not connect to mysql'.mysqli_connect_error());

    

