<?php
    include "../db/conn.php";

    $id=$_POST['id'];

    $sql="delete from doctor_details where id={$id}";

    $result=mysqli_query($conn, $sql);
    if($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>