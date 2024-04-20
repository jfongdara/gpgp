<?php
/*
    algorithm for a SELF POSTING FORM:
        if (form submitted)
            process form data
            access database
        else 
            show form
*/ 

    $displayForm ="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //you have submitted the form and need to process the form data
        //get data off the login form
        $inUsername = $_POST['username'];
        $inPassword = $_POST['password'];

        //connect to the database steps: 
            //1. Connect to the database
            require 'dbConnect.php';

            //2. Create your SQL command
            $sql = "SELECT COUNT(*) FROM GPGP_members WHERE members_username = :user AND members_password = :pass ";

            //3. Prepare your SQL Statement.......PDO Prepared Statements
            $stmt = $conn->prepare($sql);

            //4. Bind any parameters as needed
            $stmt->bindParam(':user', $inUsername);
            $stmt->bindParam(':pass', $inPassword);

            //5. execute your SQL command/prepared statment
            $stmt->execute();

            //6. Process your result-set/object
            $rowCount = $stmt->fetchColumn();       //get the number of rows located by the query
            echo "<h1>$rowCount</h1>";

            if($rowCount == 1){
                //found a valid username/password - continue processing this as a valid user
                //display Admin page
                $displayForm = false;   //DO NOT DISPLAY THE FORM, instead display the admin page
            }
            else{
                //invalid username/password combo...error messages and display form again
                $displayForm = true;    //invalid username/password - show the form to the user
                echo "<h1>Incorrect Username/Password. Please try again.</h1>";
            }

        //compare/check to see if the entered data matches the database info
        //if(matches)
            //valid user
            //display admin options
        //else
            //empty login form
            //error message

    }
    //form needs to be displayed so the user can input form data

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPGP Login</title>

    <style>
        form p:nth-of-type(1){
            display: none;
        }
    </style>
</head>
<body>

    <?php 
    if ($display == "admin"){
        //display page content
    ?>
    <h1> Admin page </h1>
    <p>Admin funcitons</p>

    <?php 
        }
        else{
    ?>
            <h1>GPGP ADMIN Processes</h1>

            <div class="loginForm">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
                <p>
                    <lable for="emailAddress">Email: </lable>
                    <input type="text" name="emailAddress" id="emailAddress">
                </p>
    
                <p>
                    <lable for="username">Username: </lable>
                    <input type="text" name="username" id="username">
                </p>
    
                <p>
                    <lable for="password">Password: </lable>
                    <input type="password" name="password" id="password">
                </p>
    
                <p>
                    <input type="submit" name="submit" value="Login">
                    <input type="reset" name="reset" value="Reset">
                </p>
    
                </form>
    
            </div>
    <?php
        }
    ?>

</body>
</html>