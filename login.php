<?php
    session_start();
    if(!isset($_POST["login"])){
        header("location:index.php");
    } else {
        include "koneksi.php";
        $username = $_POST["username"];
        $pass = SHA1($_POST["pass"]);
        
        $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass' ";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                $_SESSION["level"] = $row["level"];
                $_SESSION["npm"] = $row["npm"];
            }
            header("location:tampil_data.php");
        } else {
            header("location:index.php"); 
        }

    }
?>