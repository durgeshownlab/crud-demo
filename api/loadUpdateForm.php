<?php

include "../db/conn.php";
$cid=$_POST['cid'];

// $sql="select * from doctor_details where id={$cid}";
// $result=mysqli_query($conn, $sql);

// $sql="select * from doctor_details where id={$cid}";
$sql = "select * from doctor_details where id={$cid};";
$result=mysqli_query($conn, $sql);

$output="";

$row=mysqli_fetch_assoc($result);
    $output .='

        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="drNameIdU" class="form-label">Doctor Name</label>
                    <input type="text" class="form-control" id="drNameIdU" placeholder="Name" value="'.$row['name'].'">
                </div>
                <div class="mb-3">
                    <label for="treatmentIdU" class="form-label">Treatment</label>
                    <input type="text" class="form-control" id="treatmentIdU" placeholder="Treatment" value="'.$row['treatment'].'">
                </div>
                <div class="mb-3">
                    <label for="locationIdU" class="form-label">Location</label>
                    <input type="text" class="form-control" id="locationIdU" placeholder="Treatment" value="'.$row['location'].'">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateModalBtn">Save Changes</button>
            </div>
            </div>
        </div>
        </div>
    
    ';

echo($output);
?>