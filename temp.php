<?php
    include("database.php");

        $ID = "";
        $Name = "rivindu";
        $Email = "rivindu@gmail.com";
        $Phone_Number = "0774567890";
        $Text = "fgghjklpoiuytreessc";

        $sql ="INSERT INTO `user`(`ID`, `Name`, `Email`, `Phone_Number`, `Text`) VALUES (' $ID',' $Name','[value-3]','[value-4]','[value-5]')";

        try{
            mysqli_query($conn, $sql);
            echo "user registered";
        } catch (mysqli_sql_exception){
            echo "not registerd";
        }
        mysqli_close($conn);
       

?>