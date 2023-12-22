<?php
function sanitizeInput($input) {
    $input = trim($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

?>


<?php
//WARNING!!!
//FOR CONVENOR AND CORE COMMITTEE only
session_start();
require 'credentials.php';
if(isset($_SESSION['convenor']) && $_SESSION['convenor'] ==$convenorSession && isset($_GET['name']) ){
    //is convenor
    require '../config.php';
    $name=sanitizeInput($_GET['name']);
    $sql = "SELECT coordinators, ce, cs,  ec, ee, ar, ie, me, approval, winners FROM `events` WHERE name= '$name'";
    $result = $conn->query($sql);
    $conn->close();
    $row = $result->fetch_assoc();
}else{
    //not convenor
    header('location: ../login.php');
}
$scorearray=array((int)$row['ar'], (int)$row['ce'], (int)$row['cs'], (int)$row['ec'], (int)$row['ee'], (int)$row['ie'], (int)$row['me']) or die("FAILED");

function generatedefault($place, $eve){
    //to get the select option selected with a default value
    $li=['ar', 'ce', 'cs', 'ec','ee','ie','me'];
    $payload='<select name="'. $place .'">';
    foreach($li as $l){
        if($l !=$eve){
            $payload= $payload . '<option value="'.$l . '">'. $l . '</option>';
        }else{
            $payload= $payload . '<option value="'.$l . '"selected>'. $l . '</option>';
        }
    }

    return $payload;
}

?>



<!-- 
<center>
    <h2>Event Name: <b><?php echo $_GET['name']; ?> </b></h2><br>
    
    <h2>Coordinator: <b><?php echo $row['coordinators']; ?> </b></h2><br>
    <form method="post">
       First Place: <?php echo generatedefault(1,array_search(max($scorearray), $row)); //first place ?> <input type="number" name="p1" placeholder="Points for first place" required><br>
       Second Place: <?php echo generatedefault(2,array_search(2, $row)); //second place ?> <input type="number" name="p2" placeholder="Points for second place" required><br>
       Third Place: <?php echo generatedefault(3,array_search(1, $row)); //third place ?> <input type="number" name="p3" placeholder="Points for third place" required><br>
       <input type="submit" name="Submit" />
    </form>
</center> -->




<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Approve</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                        <center>
    <h2>Event Name: <b><?php echo $_GET['name']; ?> </b></h2><br>
    
    <h2>Coordinator: <b><?php echo $row['coordinators']; ?> </b></h2><br>
    <form method="post" class="user">
       First Place: <?php echo generatedefault(1,array_search(max($scorearray), $row)); //first place ?> <input type="number" name="p1" placeholder="Points for first place" required><br>
       Second Place: <?php echo generatedefault(2,array_search(2, $row)); //second place ?> <input type="number" name="p2" placeholder="Points for second place" required><br>
       Third Place: <?php echo generatedefault(3,array_search(1, $row)); //third place ?> <input type="number" name="p3" placeholder="Points for third place" required><br>
       <input type="submit" name="Submit" />
    </form>
</center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>


<?php
    //TODO 
    //1) UPDATE `events` SET approval=1 where name='' to mark it as approved
    //2) UPDATE the deptpoints table to match the new scores
    include '../config.php';
    if(isset($_POST['Submit'])){
        $sql = "UPDATE `events` SET approval=1 where name='$name'";
        $result = $conn->query($sql);
        $conn->close();
        echo '<script>alert("Approved '. $name .'"); /*document.location="table.php"*/;</script>';//.$name."\n". $_POST['1'] . ":" .$_POST['p1']  .",". "\n". $_POST['2'] . ":" .$_POST['p2']  .",". "\n". $_POST['3'] . ":" .$_POST['p3']  .",".  '")</script>';
        
        
    include '../config.php';
    $sql = "SELECT * FROM deptpoints";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Add each department's data to the response array
            $response[] = array(
                'Name' => $row['Name'],
                'points' => $row['points']
            );
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    //print_r($response) ;
   // echo $response[0]['Name'] . " " . $response[0]['points'];

//    UPDATE deptpoints
//    SET points = 
//        CASE 
//            WHEN Name = 'ec' THEN 112
//            WHEN Name = 'cs' THEN 123
//            WHEN Name = 'ee' THEN 124
//            ELSE points
//        END;
   

   require '../config.php';
    $sql=" UPDATE deptpoints SET points= 
    CASE \n\t
        ";
    $r=1;
         foreach(array($_POST['1'],$_POST['2'],$_POST['3']) as $places){
            for($e=0; $e<7; $e++){
                if($response[$e]['Name'] == $places){
                    $sql= $sql. " when Name =" . "'$places'" . ' THEN ' . ((int)$response[$e]['points'] + $_POST['p'. $r] )  . '
                    ';
                }
            }
           
            $r++;
         }
         $sql= $sql . ' else points end';
         echo $sql;

         $result = $conn->query($sql);
         $conn->close();
    }
?>