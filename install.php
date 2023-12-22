<?php

// Database connection parameters
$servername = "";
$username = "";
$password = "";
$database = "dishacet";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sqlCreateDb = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sqlCreateDb) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error;
    $conn->close();
    exit();
}

// Close the initial connection
$conn->close();

// Connect to the newly created database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL file path
$sqlFile = "dishacet.sql";

// Read the SQL file
$sql = file_get_contents($sqlFile);

// Execute the SQL commands
if ($conn->multi_query($sql)) {
    echo "SQL file executed successfully.";
} else {
    echo "Error executing SQL file: " . $conn->error;
}

// Close connection
$conn->close();

?>
