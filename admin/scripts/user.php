<?php

function createUser($fname, $username, $password, $email){
    $pdo = Database::getInstance()->getConnection();

    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_ip)';
    $create_user_query .= ' VALUES(:fname, :username, :password, :email, "no")';

    $create_user_result = $pdo->prepare($create_user_query);
    $create_user_result->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$password,
            ':email'=>$email,
        )
    );

    if($create_user_result){
        redirect_to('index.php');
    }else{
        return 'There was an error creating the user.';
    }
}

function getSingleUser($id) {
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user WHERE user_id = :id';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute(
        array(
            ':id'=>$id
        )
    );

    if($get_user_result){
        return $get_user_set;
    }else{
        return 'There was a problem accessing the user.';
    }
}

function editUser($fname, $username, $password, $email, $id) {
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    // run the proper sql query to update tbl_user with provper values
    $update_user_query = 'UPDATE tbl_user SET user_fname = :fname, user_name = :username, user_pass = :password, user_email = :email WHERE user_id = :id';
    $update_set= $pdo->prepare($update_user_query);
    $update_user_result = $update_set->execute(
                array(
                    ':id'=>$id,
                    ':fname'=>$fname,
                    ':username'=>$username,
                    ':password'=>$password,
                    ':email'=>$email
                )
            );

    // if everything goes well, redirect to index.php, otherwise show error message
    if($update_user_result){
        redirect_to('index.php');
    }else{
        return 'There was an error editing the user.';
    }
}

function showAllUsers() {
    $pdo = Database::getInstance()->getConnection();

    $get_users_query = 'SELECT * FROM tbl_user';
    $results = $pdo->query($get_users_query);

    if ($results){
        return $results;
    }else{
        return 'There was a problem accessing this info';
    }
}

function deleteUser($user_id) {
    $pdo = Database::getInstance()->getConnection();

    $delete_user_query = 'DELETE FROM tbl_user WHERE user_id = :id';
    $delete_user_set= $pdo->prepare($delete_user_query);
    $delete_user_result = $delete_user_set->execute(
                array(
                    ':id'=>$user_id
                )
            );


    if($delete_user_result && $delete_user_set->rowCount() > 0){
        redirect_to('admin_deleteuser.php');
    } else {
        return false;
    }

}

?>