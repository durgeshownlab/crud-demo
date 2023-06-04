<?php
    $server="localhost";
    $uname="root";
    $pass="";
    $db="crud";

    $conn=mysqli_connect($server,$uname, $pass, $db);

    if($conn)
    {

    }
    else{
        echo "database not connected";
    }

?>