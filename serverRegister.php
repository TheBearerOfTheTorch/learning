<?php
    //checking if the form was submitted
    if(isset($_POST['submit']))
    {
        //getting this from the form
        $email = $_POST['email'];
        $password = $_POST['password'];

        //declaring an array for errors
        $errors = array();
        //checking if the variables are not empty
        if(empty($email))
        {
            $errors[] = 'The email field was not field up mplease do care to fill it up';
            
            foreach($errors as $msg)
            {
                echo $msg;
            }
        }
        else if(empty($password))
        {
            $errors[] = 'The password field was not filled up please do care to fill it up, thank you';

            foreach($errors as $msg)
            {
                echo $msg;
            }
        }
        else
        {
            //come here if the fiels are all filled up
            //and so we have to trim them up
            $trimmed_email = trim($email);
            $trimmed_password = trim($password);

            //getting the db connection
            require_once('db_connection.php');

            //making the query
            $q = "INSERT INTO users(emails,passwords,updated_at) VALUES('$trimmed_email',SHA1('$trimmed_password'),NOW())";

            //run the query
            $r = @mysqli_query($dbc,$q);

            //checking if the resource link was sent succefully
            if($r)
            {
                echo ' WELCOME TO OUR SITE YOU ARE REGISTERED SUCCESSFULLY';
            }
            else{
                echo 'an error occured while trying to register your details with our database';
            }
        }
    }
