<?php

require_once '../load.php';
confirm_logged_in();

$displayUsers= showAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <table>
    
    <tr>
    <th>User ID</th>
    <th>Username</th>
    <th>User Email</th>
    <th>Action</th>
    </tr>   
    <?php while($row = $displayUsers->fetch(PDO::FETCH_ASSOC)):?>
    <tr>
        <td><?php echo $row['user_id'];?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><?php echo $row['user_email'];?></td>
        <td><?php echo '<a href="admin_deleteuser.php?id='.$row['user_id'].'">Delete User</a>'?></td>
    </tr>
    <?php endwhile;?>
</table>
</body>
</html>
