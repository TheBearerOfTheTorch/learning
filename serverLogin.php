<?php
    //checking if the form is submitted
    if(isset($_POST['submit']))
    {
        //getting this from the form
        $email = $_POST['email'];
        $password = $_POST['password'];
        //errors array
        $errors = array();

        //checking if the fields are filled up
        if(empty($email))
        {
            $errors[] = 'the email fiieds is empty care to fill it up for me please, thank you';
        }
        else if(empty($password))
        {
            $errors[] = 'the password field is empty please fill it up, thank you';
        }
        else
        {
            //trimming the variables
            $trimmed_email = trim($email);
            $trimmed_password = trim($password);

            //getting the connection
            require_once('db_connection.php');

            //cleaning the details to secure input to insure safety needed when you have things to send to the database
            // $cleaned_email = mysqli_real_escape_string($dbc,$trimmed_email);
            // $cleaned_password = mysqli_real_escape_string($dbc,$trimmed_password);

            //making the query
            $query = "SELECT * FROM users";

            //executing the query
            $r = @mysqli_query($dbc,$query);

            //checking if the query was successful
            if($r)
            {
                //fetching the result
                while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
                {
                    $email_array =  $row['emails'];
                    $password_array = $row['passwords'];
                    
                    //hushing the password to be compered
                    $hushed_password = SHA1($trimmed_password);

                    //comparing the details with that form the databse and the user input details
                    if($trimmed_email == $email_array)
                    {
                        echo $email_array.'<br>';
                        echo $password_array;
                    }
                    else {
                        
                        echo 'you detials do not match our records, tyr again';
                    }
                }
            }
            else {
                echo 'an error occuered while trying to retrieve the datas from the database';
            }

            //closing the db connection
            mysqli_close($dbc);
        }
    }

?>