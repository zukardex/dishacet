<?php
require 'config.php';
session_start();
if((isset($_SESSION['name']))){
    echo 'You are already logged in as ' .$_SESSION['name'] .' your dept is ' .$_SESSION['dept'];
}
// if(isset($_POST['submit'])){
//     $sql= "SELECT FROM participants where ";
//         if ($conn->query($sql) === TRUE) {
//             session_start();
//             $_SESSION['name']= $_POST['name'];
//             $_SESSION['dept']=$_POST['dept'];
//             echo $_SESSION['name'];
//         } else {
//             echo "Error on sql operation " . $conn->error;
//         }

//         $conn->close();
 
// }
?>