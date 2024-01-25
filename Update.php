<?php
session_start();
include("database.php");

if (isset($_POST['update'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone_Number = $_POST['Phone_Number'];
    $Text = $_POST['Text'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE feedback SET Name ='$Name', Email = '$Email', Phone_Number = '$Phone_Number',
        Text = '$Text' WHERE ID = '$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $user_id = $_GET['ID'];
    $sql = "SELECT * FROM feedback WHERE ID = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $Name = $row['Name'];
            $Email = $row['Email'];
            $Phone_Number = $row['Phone_Number'];
            $Text = $row['Text'];
            
            $ID = $row['ID'];
        }

?>

        <!DOCTYPE html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>admin</title>
        </head>

        <body>
            <h2>Update contestant</h2>

            <form action="Update.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $ID; ?>">
                Name:<br>
                <input type="text" name="Name" value="<?php echo $Name; ?>"><br>
                Email:<br>
                <input type="email" name="Email" value="<?php echo $Email; ?>"><br>
                Phone_Number:<br>
                <input type="text" name="Phone_Number" value="<?php echo $Phone_Number; ?>"><br>
                <br>
                Text:<br>
                <input type="text" name="Text" value="<?php echo $Text; ?>"><br>
                
                <input type="submit" name="update" value="update">
            </form>

        </body>

        </html>
<?php
    } else {
        header('Location: Read.php');
    }
}
?>