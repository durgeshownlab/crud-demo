<?php
    include "../db/conn.php";

    $name=$_POST['name'];
    $treatment=$_POST['treatment'];
    $location=$_POST['location'];

    if($name=="")
    {
        echo 0;
    }
    else if($treatment==""){
        echo 0;
    }
    else if($location==""){
        echo 0;
    }
    else{
        $sql="insert into doctor_details (name, treatment, location) values ('".$name."', '".$treatment."', '".$location."');";

        $result=mysqli_query($conn, $sql);
        if($result)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
?>
