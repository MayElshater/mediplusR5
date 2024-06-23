<?php
session_start();
if(isset($_SESSION["age"])){
    echo $_SESSION["age"];
}

?>