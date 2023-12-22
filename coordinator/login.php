<?php
 session_start();
// Define a 2D array with usernames and passwords
require 'credentials.php';

// Function to check login credentials
function checkLogin($username, $password, $users) {
    foreach ($users as $user) {
        if (isset($user['name']) && isset($user['password']) &&
            $user['name'] === $username && $user['password'] === $password) {
            $_SESSION['coordinatorName']=$user['name'];
            $_SESSION['group']=$user['group'];
            
            $_SESSION['eventName']=$user['event'];
            return true; // Login successful
        }
    }
    return false; // Login failed
}

// Example usage
if (isset($_POST['Submit'])) {
    $enteredUsername = isset($_POST['username']) ? $_POST['username'] : "";
    $enteredPassword = isset($_POST['password']) ? $_POST['password'] : "";

    if (checkLogin($enteredUsername, $enteredPassword, $users)) {
        echo "Login successful";
       
        $_SESSION['coordinator'] = $enteredUsername;
        echo $_SESSION['coordinator']. '<script>document.location="d/dashboard.php"</script>';
        
    } else {
        echo "Invalid username or password";
    }
}

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>dishaCoordinators</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Login for Event coordinators</h2>
                    <p class="w-lg-50">A unique password for you is shared with the core committee.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <form class="text-center" method="post">
                                <div class="mb-3"><input class="form-control" type="tel" name="username" placeholder="Phone number" /></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="Submit">Login</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>