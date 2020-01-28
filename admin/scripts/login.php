<?php

function login($username, $password){
    //Debug

    $message = sprintf('You are trying to login with username %s and %s', $username, $password);

    return $message;
}

?>