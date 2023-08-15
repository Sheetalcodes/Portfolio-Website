<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$server = "localhost";
$username = "root";
$password = "";
$database = "dm";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection to database failed due to" . mysqli_connect_error());
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        
        if (!empty($name) && !empty($email) && !empty($message)) {
            $sql = "INSERT INTO main (name, email, message) VALUES ('$name', '$email', '$message')";
            
// echo $sql;

            if ($con->query($sql) === true) {
                echo "Thank You for reaching me out! I'll contact you soon!";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        } else {
            echo "Please fill in all fields.";
        }
    } else {
        echo "Form fields are not set.";
    }
}


    
?>
