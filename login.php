<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
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
            //response
            echo $myJSON;

            
        }else{
            echo "404";
        }
    }
?>