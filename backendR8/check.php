<?php
session_start();
if(isset($_SESSION["logged"]) and $_SESSION["logged"] ){
    echo "you are loged in";
}else{
    echo "you are loged out";
}
?>