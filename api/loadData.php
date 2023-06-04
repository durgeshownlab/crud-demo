<?php

include "../db/conn.php";

$sql="select * from doctor_details";
$result=mysqli_query($conn, $sql);

$output="";

if( mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $output .='
        <div class="card" style="width: 18rem;">
            <img src="img/aata.webp" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">'.$row['name'].'</h5>
                <p class="card-text">'.$row['treatment'].'</p>
                <p class="card-text">'.$row['location'].'</p>
                <button type="button" class="btn btn-danger btn-sm delete-card" data-id="'.$row['id'].'">Delete</button>
                <button type="button" class="btn btn-primary btn-sm update-card" data-id="'.$row['id'].'">Update</button>
            </div>
          </div>
        ';
    }
}

echo($output);
?>