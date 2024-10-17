<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Schools DataBase</title>
</head>
<body>
    



<?php
    $host = '127.0.0.1';
    $user = 'root';
    $password = 'root';
    $db = 'publicschool';
    $port = 8889;

    $connect = mysqli_connect($host, $user, $password, $db, $port);

    if (!$connect) {
        echo 'Error Code: ' . mysqli_connect_errno();
        echo '<br>Error Message: ' . mysqli_connect_error();
        exit();
    } else {
        echo "Connection to the database Successful<br>";
    }

    $query = 'SELECT * FROM public_school_contact_list_may2024_en';
    $result = mysqli_query($connect, $query);

    if (!$result) {
        echo 'Error: ' . mysqli_error($connect);
    } else {
        echo '
        <div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
            <div class="toast-container position-absolute p-3" id="toastPlacement">
                <div class="toast">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">Bootstrap</strong>
                    <small>11 mins ago</small>
                </div>
                <div class="toast-body">
                    Hello, The query found: ' . mysqli_num_rows($result) . ' rows<br>
                </div>
                </div>
            </div>
            </div>
        ';
        

    }
    ?>
    <table class="table table-striped table-hover table-bordered">
    <thead >
        <tr class="table-success" >
            <th scope="col">#</th>
            <th scope="col">Board Name</th>
            <th scope="col">School Number</th>
            <th scope="col">School Name</th>
            <th scope="col">School Level</th>
            <th scope="col">School Language</th>
            <th scope="col">School Type</th>
            <th scope="col">School Special Conditions</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>
            <th scope="col">Province</th>
            <th scope="col">Phone</th>
            <th scope="col">Fax</th>
            <th scope="col">Grade Range</th>
            <th scope="col">Date Open</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
        <?php
        $i=0;
        // Display user data using a for loop
        foreach($result as $row) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['Board Name'] . "</td>";
            echo "<td>" . $row['School Number'] . "</td>";
            echo "<td>" . $row['School Name'] . "</td>";
            echo "<td>" . $row['School Level'] . "</td>";
            echo "<td>" . $row['School Language'] . "</td>";
            echo "<td>" . $row['School Type'] . "</td>";
            echo "<td>" . $row['School Special Conditions'] . "</td>";
            echo "<td>" . $row['Street'] . "</td>";
            echo "<td>" . $row['City'] . "</td>";
            echo "<td>" . $row['Province'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Fax'] . "</td>";
            echo "<td>" . $row['Grade Range'] . "</td>";
            echo "<td>" . $row['Date Open'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </table>
    <?php
    // Close database connection
    mysqli_close($connect);
    ?>


</body>
</html>