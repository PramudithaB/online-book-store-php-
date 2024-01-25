<?php
session_start();

include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $UserName = $_POST['User_Name'];
    $Fname = $_POST['Full_Name'];
    $Email = $_POST['Email'];
    $UserType = $_POST['Type'];
    $Password = $_POST['Password'];

    if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {

        $query = "INSERT INTO `user`(`ID`, `User_Name`, `Full_Name`, `Email`, `User_Type`, `Password`) VALUES ('$ID','$UserName','$Fname','$Email','$UserType','$Password')";

        mysqli_query($conn, $query);
        echo "<script type='text/javascript'>alert('Successfully Register')</script>";
        header("location:logIn.php");
    } else {
        echo "<script type='text/javascript'>alert('Please Enter some Valid Deatails')</script>";
    }
}
?>
<html>

<head>
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="./styles/SignUp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <section class="menu">
        <div class="nav">
            <div class="logo">
                <h1>Book<b>shop</b></h1>
            </div>
            <ul>
                <li><a class="active" href="homeBook.html">Home</a></li>
                <li><a href="category.html">Category</a></li>
                <li><a href="OFFER.HTML">Offers</a></li>
                <li><a href="aboutusnew.html">About Us</a></li>
                <li><a href="Create.php">Feedback</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="SignUp.php">SignUp</a></li>
                <li><a href="payment2.html">Add to Cart</a></li>
            </ul>
            
        </div>
    </section>


    <div class="sign-up-form">
        <img src="./images/usericon.png">
        <h1> Sign Up </h1>
        <form method="POST">
            <input type="text" name="User_Name" class="input-box" placeholder="Username">
            <input type="text" name="Full_Name" class="input-box" placeholder="Full Name">
            <input type="email" name="Email" class="input-box" placeholder="Email">
            <select name="Type">
            <option value="">-Select-</option>
            <option value="User">User</option>
            <option value="Supplier">Supplier</option>
            </select>
            
                <input type="Password" name="Password" class="input-box" placeholder="Password ">
                <input type="Password" class="input-box" placeholder="Confirm Password"> <br>
                <button type="submit" class=" SignUp-btn">Sign Up</button>
                <p>Already have an account ? <a href="login.php"> Login </a></p>

        </form>
    </div>

    <footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="contact1.html">Contact Us</a></li>
                    <li><a href="terms.html">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="footerBottom">
                <p> Copyright &copy; Designed by <span class="designer">us</span></p>
            </div>
        </div>
    </footer>


</body>

</html>