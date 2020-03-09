<?php

require_once '../load.php';
confirm_logged_in();

$displayUsers= showAllUsers();

if(!$displayUsers){
    $message = 'Failed to get list of users.';
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $delete_result = deleteUser($user_id);

    if(!$delete_result){
        $message = 'Failed to delete user.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h2>Delete Users</h2>

    <table>
    <thead>
    <tr>
    <th>User ID</th>
    <th>Username</th>
    <th>User Email</th>
    <th>Action</th>
    </tr>   
    </thead>
    <tbody>
    <?php while($row = $displayUsers->fetch(PDO::FETCH_ASSOC)):?>
    <tr>
        <td><?php echo $row['user_id'];?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><?php echo $row['user_email'];?></td>
        <td><?php echo '<a href="admin_deleteuser.php?id='.$row['user_id'].'">Delete User</a>'?></td>
    </tr>
    <?php endwhile;?>
    </tbody>
</table>
</body>
</html>
