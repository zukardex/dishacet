
<?php
session_start();
if(isset($_SESSION['coordinator'])){
    //tru that the visitor is a coordinator, or he is logged in as a coordinator
    
}else{
    echo '<h1><b>you are not logged in</b></h1>';
}

?>
