


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISHA'23</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
	
        <h1 class="mb-4"> Welcome to DISHA'23 Dashboard</h1>

        <a href="coordinators/login.php" class="btn btn-primary">Login as a coordinator</a><br>
        <a href="core/login.php" class="btn btn-primary">Login for Convenor/Core Committee</a><br>



        <h6 class="mb-4" id="highestTimestamp"></h6>
        <div id="result" class="table-responsive"></div>
    </div>

    <script>
        re();

        setInterval(re, 5000);

        function re() {
            var xhr = new XMLHttpRequest();
            // UPDATE THE LINK!!!!!
            xhr.open("POST", "http://localhost:801/dishacet/score/retrieve.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    //console.log("Raw Response:", xhr.responseText);

                    if (xhr.status == 200) {
                        try {
                            var data = JSON.parse(xhr.responseText);
                            data.sort((a, b) => b.points - a.points); // Sort data by points in descending order
                            displayDataInTable(data); // Call a function to display sorted data in a table
                            displayHighestTimestamp(data); // Display the highest timestamp
                        } catch (error) {
                            console.error("JSON parsing error:", error);
                            document.getElementById("result").innerHTML = "<p class='text-danger'>An error occurred while processing the server response.</p>";
                        }
                    } else {
                        console.error("AJAX error - Status:", xhr.status, "Error:", xhr.statusText);
                        document.getElementById("result").innerHTML = "<p class='text-danger'>An error occurred while processing your request.</p>";
                    }
                }
            };

            xhr.send("0");
        }

        // Function to display data in a sorted table
        function displayDataInTable(data) {
            var tableHtml = "<table class='table table-bordered table-striped'><thead><tr><th>Name</th><th>Points</th></tr></thead><tbody>";

            for (var i = 0; i < data.length; i++) {
                tableHtml += "<tr><td>" + data[i].Name + "</td><td>" + data[i].points + "</td></tr>";
            }

            tableHtml += "</tbody></table>";

            // Update the result div with the sorted table
            document.getElementById("result").innerHTML = tableHtml;
        }

        // Function to display the highest timestamp
        function displayHighestTimestamp(data) {
            var highestTimestamp = findHighestTimestamp(data);
            document.getElementById("highestTimestamp").innerHTML = "Last Updated: " + highestTimestamp;
        }

        // Function to find the highest timestamp in the data array
        function findHighestTimestamp(data) {
            var highestTimestamp = 0;

            for (var i = 0; i < data.length; i++) {
                var timestamp = new Date(data[i].timestamp).getTime();
                if (timestamp > highestTimestamp) {
                    highestTimestamp = timestamp;
                }
            }

            return new Date(highestTimestamp).toLocaleString('en-US', { day: 'numeric', month: 'long', hour: 'numeric', minute: 'numeric', hour12: true });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
