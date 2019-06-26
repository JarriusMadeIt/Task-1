<?php
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["recaptcha_response"])){

        //creating post request 
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LfIwqoUAAAAAKeX7cfsvcTbQfE7LuuHFWnSbV9t';
        $recaptcha_response = $_POST['recaptcha_response'];

        //creating string and create request
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        //decoding from json
        $recaptcha = json_decode($recaptcha);
        if ($recaptcha->score >= 0.5) {
            // Verified

        //storing post values into variables
        $uEmail = "";
        $uPassword = "";

        if(isset($_POST["email"])&&isset($_POST["password"])){
            $uEmail = $_POST["email"];
            $uPassword = $_POST["password"];
        }
        //connecting to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "task1";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * FROM user WHERE email = '$uEmail' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            
            $myJSON = json_encode($row);
            //add to session
            $_SESSION["email"] = $row["email"];
            $_SESSION["signedIn"]="true";
            //response
            echo $myJSON;
        }else{
            echo "404";
        }
        } else {
            // Not verified
            echo "bot";
        }

    }
?>