<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page or any other page
    exit;
}

// Retrieve user data from the database

require_once 'database.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);


if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}

// Handle form submission

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $UserName = $_POST['User_Name'];
    $Fname = $_POST['Full_Name'];
    $Email = $_POST['Email'];


    // Sanitize inputs (You can use additional validation if needed)

    $UserName = mysqli_real_escape_string($conn, $UserName);
    $Fname = mysqli_real_escape_string($conn, $Fname);
    $Email = mysqli_real_escape_string($conn, $Email);


    // Update the user's details in the database

    $query = "UPDATE `user` SET `User_Name`='$UserName',`Full_Name`='$Fname',`Email`=' $Email ',`Password`=' $Password' WHERE ID='$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user['User_Name'] = $UserName;
        $user['Full_Name'] = $Fname;
        $user['Email'] = $Email;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>D ashboard</title>
    <link rel="stylesheet" href="./styles/dashboard.css">


</head>

<body>
    <div id="background">
        <div class="container">

            <h2>Welcome, <?php echo $user['User_Name']; ?>!</h2>
            <p>Email: <?php echo $user['Email']; ?></p>
            <hr>
            <h3>User Details</h3>
            <p><strong>UserName:</strong> <?php echo $user['User_Name']; ?></p>
            <p><strong>FullName:</strong> <?php echo $user['Full_Name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
            <hr>
            <h3>Update User Details</h3>
            <form action="" method="POST">
                <input type="text" name="User_Name" placeholder="User_Name" value="<?php echo $user['User_Name']; ?>" required><br>
                <input type="text" name="Full_Name" placeholder="Full_Name" value="<?php echo $user['Full_Name']; ?>" required><br>
                <input type="text" name="Email" placeholder="Email" value="<?php echo $user['Email']; ?>" required><br>
                <input type="password" name="Password" placeholder="Password" value="<?php echo $user['Password']; ?>" required><br>
                <br>
                <input type="submit" value="Submit">
            </form>
            <hr>
            <a href="logout.php">Logout</a>
            <br><br>
            <a href="deleteUser.php">Delete Account</a>
        </div>
    </div>
</body>

</html>