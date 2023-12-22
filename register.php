<?php
require 'config.php';
if(isset($_POST['name']) ){

    $sql= "INSERT INTO participants(name, dept, admn, phn, email) VALUES ('" . $_POST['name'] . "','". $_POST['dept'] . "', '" . $_POST['admn'] . "', '" . $_POST['phn'] . "','"   .  $_POST['email'] ."')";

        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['name']= $_POST['name'];
            $_SESSION['dept']=$_POST['dept'];
            //echo $_SESSION['dept'];
        } else {
            echo "Error on sql operation " . $conn->error;
        }

        $conn->close();
 

}else{echo 0;}
?>
