<?php
include("database.php");
$sql = "SELECT* FROM feedback";
$result = $conn -> query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone_Number</th>
                    <th>Text</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result -> num_rows > 0){

                    while ($row = $result -> fetch_assoc()){
                        if($row['ID'] == 291){
                ?>
                        <tr>
                            <td><?php echo $row['Name']?></td>
                            <td><?php echo $row['Email']?></td>
                            <td><?php echo $row['Phone_Number']?></td>
                            <td><?php echo $row['Text']?></td>
                            <td><a href="Update.php?ID=<?php echo $row['ID']; ?>">Update</a></td>
                            <td><a href="Update.php?ID=<?php echo $row['ID']; ?>">Delete</a></td>
                        </tr>



                <?php      }elseif($row['ID'] >= 292){
                
                ?>
                        <tr>
                            <td><?php echo $row['Name']?></td>
                            <td><?php echo $row['Email']?></td>
                            <td><?php echo $row['Phone_Number']?></td>
                            <td><?php echo $row['Text']?></td>
                        </tr>

                <?php  }
                    }
                }

                ?>
            </tbody>
        </tr>
    </table>
</body>
</html>