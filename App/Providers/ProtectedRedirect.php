<?php

function checkSession(){
    if(!isLoggedIn()){
        redirect('auth/login');
    }

}

?>