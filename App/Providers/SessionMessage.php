<?php
session_start();


function flash($name = '', $message = '', $class = "alert alert-dissmissable alert-"){
    if(!empty($name)){
    if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
        unset($_SESSION[$name]);
        }

        if(!empty($_SESSION[$name. '_class'])){
        unset($_SESSION[$name. '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;
    } elseif(empty($message) && !empty($_SESSION[$name])){
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
        echo '<div class="'.$class.''.$name.'" id="flash-msg">'.$_SESSION[$name]. "<button class='close' data-dismiss='alert'><span></span>&times</button>". '</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
    }
    }
}

function upload(){
        // $data['image'] = $_FILES['image']['name'];
        // $data['image_temp'] = $_FILES['image']['tmp_name'];
        

}
?>