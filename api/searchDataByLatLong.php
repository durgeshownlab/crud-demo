<?php
require "../vendor/autoload.php";
// Latitude: 28.8782204
// Longitude: 77.1110401
$lat=$_POST['lat'];
$long=$_POST['long'];
$final=$lat.','.$long;
$geocoder = new \OpenCage\Geocoder\Geocoder('dfb6415dbabf4b9a912237e5d9d4727c');
$result = $geocoder->geocode($final); # latitude,longitude (y,x)
// echo $result['results'][0]['components']['county'];
$city = $result['results'][0]['components']['county'];
# 3 Rue de Rivarol, 30020 Nîmes, France

include "../db/conn.php";

$output='';

    $sql="select * from doctor_details where location like '{$city}%'";

    $result=mysqli_query($conn, $sql);

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
                    <button type="button" class="btn btn-primary btn-sm update-card" data-id="'.$row['id'].'"  data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                </div>
            </div>
            ';
        }
    }
    else{
        $output .='No doctor available At this location';
    }

    echo($output);

?>