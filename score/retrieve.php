<?php
// //To retreive the department scores
// require 'config.php';

// $sql= "SELECT * FROM deptpoints";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//    // $co=0;
//     while($row = $result->fetch_assoc()) {
//         $response = array(($row['Name']) => "$row['points']", "timestamp" => "$row['points']");
//         //$co++;
     
//     }
// } else {
//     echo "0 results";
// }

?>


<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    // $response = array("cse" => 'f', "timestamp" => '4');

//     // Send the response as JSON
//     header('Content-Type: application/json');
//     echo json_encode($response);
// } else {
//     // Handle the case where the request is not POST
//     echo "Invalid request method.";
// }
?>
<?php
require 'config.php';

// Initialize an empty array to store department scores
$response = array();

$sql = "SELECT * FROM deptpoints";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add each department's data to the response array
        $response[] = array(
            'Name' => $row['Name'],
            'points' => $row['points'],
            'timestamp' => $row['updatedTime']
        );
    }
} else {
    echo "0 results";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle the case where the request is not POST
    echo "Invalid request method.";
}
?>
