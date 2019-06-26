<?php
    if($_SERVER["REQUEST_METHOD"]=="POST" &&isset($_POST["recaptcha_response"])){

        //making post request to google api
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LfIwqoUAAAAAKeX7cfsvcTbQfE7LuuHFWnSbV9t';
        $recaptcha_response = $_POST['recaptcha_response'];

        //creating string and create request
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        //decoding from json
        echo $recaptcha;

        $recaptcha = json_decode($recaptcha);
        if ($recaptcha->score >= 0.5) {
         //verified as user

        //data already validated so can be directly inserted to database

        //connecting to database
         //connecting to database
        
    //      $servername = "localhost";
    //      $username = "root";
    //      $password = "";
    //      $dbname = "task1";
 
    //      $conn = new mysqli($servername, $username, $password, $dbname);
    //      if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     } 
    //     $sql = "INSERT INTO user (email, password,firstName,lastName,age,address)
    //     VALUES ('".$_POST['SignUpEmail']."', '".$_POST['SignUpPassword']."', '".$_POST['SignUpFirstName']."', '".$_POST['SignUpLastName']."', " .$_POST['SignUpAge'].",'". $_POST['SignUpAddress']."')";

    //  //execute query
     
    // if ($conn->query($sql) === TRUE) {
    // echo "success";
    // } else {
    // echo "404";
    // }

    // $conn->close();

    }else{
        echo "bot";
    }



}
?>