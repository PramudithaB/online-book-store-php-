<?php
session_start();

if (isset($_GET['msg'])) {
    echo '<script> alert ("Successfully Updated") </script>';
} else if (isset($_GET['msg1'])) {
    echo '<script>  alert("Your Username is Already Exist.Please refill the form with unique User Name.");</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/supplierdashboard.css">
    <title>Supplier Page</title>
</head>

<body>


    <div>
        <center>
            <h1 style="margin-left: 140px">WELCOME <image style=" float:right ; width:7%; height:10%" class="logout" src="./images/8.1.jpg" width="10%">
            </h1>
            <h2 style="margin-left: 140px">Supplier Dashboard </h2>
        </center>
    </div>
    <button style="float:right;margin-right:1%; width:8%" type="submit"><a href="logout.php">Log out</a></button>
    </div>
    <br><br>
    <div>
        <center>
            <img src="./images/9.1.png">
        </center>
    </div>
    <br><br>

</body>

<?php

include "database.php";

$userID = $_SESSION['user_id'];

$sql = "SELECT * FROM user WHERE ID = '$userID'";
$result = $conn->query($sql);
echo ("<table cellpadding='1' class='admintable' border='1'>");
echo ("<tr>");
echo ("<th>" . "ID" . "</th>");
echo ("<th>" . "User Name" . "</th>");
echo ("<th>" . "Full Name " . "</th>");
echo ("<th>" . "Email" . "</th>");
echo("<th>" . "Action" . "</th>");

echo ("</tr>");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo ("<tr>");
        echo ("<td>" . $row["ID"] . "</td>");
        echo ("<td>" . $row["User_Name"] . "</td>");
        echo ("<td>" . $row["Full_Name"] . "</td>");
        echo ("<td>" . $row["Email"] . "</td>");
        echo ("<td>" . "<a id='deletelink' href=./deletesupplier.php?id=" . $row['ID'] . ">" . "Delete" . "</a>" . "<a id='editlink' href=./editsupplier.php?id=" . $row['ID'] . ">" . "Update" . "</a>" . "</td>");
        
        echo ("</tr>");
    }
    echo ("</table>");
}
$conn->close();

?>

</html>