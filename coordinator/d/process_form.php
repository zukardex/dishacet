<?php
// require '../config.php';

// session_start();
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['coordinatorName'])) {
//     $Place[0] = $_POST["first"] ?? ""; //name of the participant
//     $Place[1] = $_POST["second"] ?? "";
//     $Place[2] = $_POST["third"] ?? "";
//     $depts[0] = $_POST["depts1"] ?? "";
//     $depts[1] = $_POST["depts2"] ?? "";
//     $depts[2] = $_POST["depts3"] ?? "";
//     $depts[3] ="";
//     $depts[4] = "";
//     $depts[5] = "";
//     if(($_SESSION["group"])==0){
//         $score_i=[8,4,2]; // score scheme for individual, first
//       }else{
//         $score_i=[32,16,8];
//     }
// $deptScores=array(
//     "ar"=>0,
//     "ce"=>0,
//     "cs"=>0,
//     "ec"=>0,
//     "ee"=>0,
//     "ie"=>0,
//     "me"=>0

// );//In the alphabetical order, starting from architecture department
// $deptkeys=array_keys($deptScores);
// foreach ($depts as $dept) {
//     $index = array_search($dept, $deptScores);
//     if ($index !== false) {
//         $deptScores[$dept] += $score_i[$index];
//     }
// }




// $deptscorecard = "
// ar = '" . $deptScores['ar'] . "',
// ce = '" . $deptScores['ce'] . "',
// cs = '" . $deptScores['cs'] . "',
// ec = '" . $deptScores['ec'] . "',
// ee = '" . $deptScores['ee'] . "',
// ie = '" . $deptScores['ie'] . "',
// me = '" . $deptScores['me'] . "'
// ";
// echo $deptscorecard;
// $sql = "UPDATE events
//         SET winners = '" . implode(', ', $Place) . "',
//         $deptscorecard
//         WHERE name = '" . $_SESSION['eventName'] . "'";

//             if ($conn->query($sql) === TRUE) {
//             } else {
//                 echo "Error on sql operation " . $conn->error;
//             }

//             $conn->close();
   
// } else {
//     // Handle the case where the request method is not POST
//     echo "Invalid request method.";
// }
?>
<?php
require '../config.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['coordinatorName'])) {
    $Place[0] = $_POST["first"] ?? "";
    $Place[1] = $_POST["second"] ?? "";
    $Place[2] = $_POST["third"] ?? "";
    $depts[0] = $_POST["depts1"] ?? "";
    $depts[1] = $_POST["depts2"] ?? "";
    $depts[2] = $_POST["depts3"] ?? "";
$scoress=array(
    "ar"=>0,
    "ce"=>0,
    "cs"=>0,
    "ec"=>0,
    "ee"=>0,
    "ie"=>0,
    "me"=>0
);



// $deptscorecard = "
// $depts[0] = '"."$scoress[$depts[0]]"."',
// $depts[1] = '"."$scoress[$depts[1]]"."',
// $depts[2] = '". "$scoress[$depts[2]]"."'
// ";

$deptscorecard="$depts[0]='3', $depts[1]='2', $depts[2]='1' ";


    $sql = "UPDATE events
            SET winners = '" . implode(', ', $Place) . "',
            $deptscorecard, entryTime= now()
            WHERE name = '" . $_SESSION['eventName'] . "'";
echo $sql;
    if ($conn->query($sql) === TRUE) {
        // Success
    } else {
        echo "Error on SQL operation: " . $conn->error;
    }

    $conn->close();
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method.";
}
?>
