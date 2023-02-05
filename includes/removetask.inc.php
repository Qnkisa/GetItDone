<?php

if(isset($_POST["removetask"])){

    $removeId = $_POST["taskremoveid"];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    removeTask($conn, $removeId);

}
else{
    header("location: ../index.php");
    exit();
}