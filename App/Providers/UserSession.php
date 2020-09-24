<?php

    function userSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    
    }
    
    function endSession(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    
    }
    
    function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
    }

?>