<?php

session_start();

if(isset($_POST['submit'])){
    echo "Form Submitted!";

    $Inevent_name = $_POST['event_name'];
    $Inevent_begin_date = $_POST['event_begin_date'];
    $Inevent_end_date = $_POST['event_end_date'];
    $Inevent_location_name = $_POST['event_location_name'];
    $Inevent_address1 = $_POST['event_address1'];
    $Inevent_address2 = $_POST['event_address2'];
    $Inevent_city = $_POST['event_city'];
    $Inevent_state = $_POST['event_state'];
    $Inevent_zip = $_POST['event_zip'];
    $Inevent_phone_number = $_POST['event_phone_number'];
    $Inevent_location_note1 = $_POST['event_location_note1'];
    $Inevent_location_note2 = $_POST['event_location_note2'];
    $Inevent_location_url = $_POST['event_location_url'];

    //echo $Inevent_name;
    //echo $eventDesc;
    //echo $eventPresenter;

    //connect to database
    try{

        require 'dbConnect.php';

        //create SQL Statement
        $sql = "INSERT INTO gpgp_event (event_name, event_begin_date, event_end_date, event_location_name, event_address1, event_address2, event_city, event_state, event_zip, event_phone_number, event_location_note1, event_location_note2, event_location_url) 
        VALUES (:Inevent_name, :Inevent_begin_date, :Inevent_end_date, :Inevent_location_name, :Inevent_address1, :Inevent_address2, :Inevent_city, :Inevent_state, :Inevent_zip, :Inevent_phone_number, :Inevent_location_note1, :Inevent_location_note2, :Inevent_location_url)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Inevent_name',$Inevent_name);  
        $stmt->bindParam(':Inevent_begin_date',$Inevent_begin_date);  
        $stmt->bindParam(':Inevent_end_date',$Inevent_end_date);  
        $stmt->bindParam(':Inevent_location_name',$Inevent_location_name);  
        $stmt->bindParam(':Inevent_address1',$Inevent_address1);  
        $stmt->bindParam(':Inevent_address2',$Inevent_address2);  
        $stmt->bindParam(':Inevent_city',$Inevent_city);  
        $stmt->bindParam(':Inevent_state',$Inevent_state);  
        $stmt->bindParam(':Inevent_zip',$Inevent_zip);  
        $stmt->bindParam(':Inevent_phone_number',$Inevent_phone_number);  
        $stmt->bindParam(':Inevent_location_note1',$Inevent_location_note1);  
        $stmt->bindParam(':Inevent_location_note2',$Inevent_location_note2);  
        $stmt->bindParam(':Inevent_location_url',$Inevent_location_url);  
       
        $stmt->execute();
        
        echo "Working so far";          //basic confirnmation message - NEED IMPROVED!

        //send to a 'response page' to display to customer that everything workded
        //header('Location: createEvent.php');


    }
    catch(PDOException $e)
    {
            $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

            error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
            error_log(var_dump(debug_backtrace()));
        
            //Clean up any variables or connections that have been left hanging by this error.		
        
            //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
    }
    //connect to database
    //create SQL Statement
    //prepare the SQL Statement
    //bind parameters into the prepared statement
    //execute the prepared statement
    //display a confirmation message

}
else{
    echo "Form Not Submitted!";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Great Plains Games Players home page">
    <title>Great Plains Games Players</title>

    <link rel="icon" type="image/x-icon" href="images/GPGP_Logo_Transparent_white.png">
    <link rel="stylesheet" href="css/home-stylesheet.css">
    <link rel="stylesheet" href="css/createEventStyle.css">
    <link rel="stylesheet" href="https://use.typekit.net/lqa6jva.css">
    <script src="javascript/functions.js"></script>
</head>
<body onload="pageLoad()">
    <nav>
        <a href="index.html" class="GPGP-large">GPGP</a>

        <div class="menu-links">
            <ul>
                <li><a href="index.html">About</a></li>
                <li><a href="event.html">Events</a></li>
                <li><a href="#">Links</a></li>
            </ul>

            <a href="#" class="login-button">Login</a>
        </div>

        <div class="hamburger-menu">
            <span id="ham-bar-1"></span>
            <span id="ham-bar-2"></span>
            <span id="ham-bar-3"></span>
        </div>
    </nav>

    <header>
        <h1>
            <div>Great Plains</div>
            <img src="images/GPGP_Logo_Transparent_white.png" alt="great plains games players logo">
            <div>Add Event</div>
        </h1>
    </header>

<div id="form">
        <h2>Create Event</h2>
        <hr>
        <form method="post" action="createEvent.php">
                <p>
                    <label for="event_name">Event Name: </label>
                    <input type="text" name="event_name" id="event_name">
                </p>

                <p>
                    <label for="event_begin_date">Event Begin Date: </label>
                    <input type="date" name="event_begin_date" id="event_begin_date">
                </p>

                <p>
                    <label for="event_end_date">Event End Date: </label>
                    <input type="date" name="event_end_date" id="event_end_date">
                </p>

                <p>
                    <label for="event_location_name">Event Location Name: </label>
                    <input type="text" name="event_location_name" id="event_location_name">
                </p>

                <p>
                    <label for="event_address1">Event Address Line 1: </label>
                    <input type="text" name="event_address1" id="event_address1">
                </p>

                <p>
                    <label for="event_address2">Event Address Line 2: </label>
                    <input type="text" name="event_address2" id="event_address2">
                </p>

                <p>
                    <label for="event_city">Event City: </label>
                    <input type="text" name="event_city" id="event_city">
                </p>

                <p>
                    <p>Select a state</p>
                    <select name="event_state" id="event_state">
                        <option value="" selected="selected">Please Select a State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </p>

                <p>
                    <label for="event_zip">Event Zip Code: </label>
                    <input type="text" name="event_zip" id="event_zip">
                </p>

                <p>
                    <label for="event_phone_number">Event Phone Number: </label>
                    <input type="tel" name="event_phone_number" id="event_phone_number">
                </p>

                <p>
                    <label for="event_location_note1">First Event Location Note : </label>
                    <input type="text" name="event_location_note1" id="event_location_note1">
                </p>

                <p>
                    <label for="event_location_note2">Second Event Location Note: </label>
                    <input type="text" name="event_location_note2" id="event_location_note2">
                </p>

                <p>
                    <label for="event_location_url">Event Location URL: </label>
                    <input type="url" name="event_location_url" id="event_location_url">
                </p>

                <p>
                    <input type="submit" value="Submit" name="submit" id="submit">
                    <input type="reset" value="Try Again">
                </p>
        </form>
    </div>
   


    <footer>
        <ul>
            <li><a href="#">Code of Conduct</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>

        <p>&copy;2024 All Rights Reserved</p>
    </footer>
</body>
</html>

<?php
    }
?>