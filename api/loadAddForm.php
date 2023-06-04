<?php

$output='
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabel">Add New Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
        <label for="drNameId" class="form-label">Doctor Name</label>
        <input type="text" class="form-control" id="drNameId" placeholder="Name">
        </div>
        <div class="mb-3">
        <label for="treatmentId" class="form-label">Treatment</label>
        <input type="text" class="form-control" id="treatmentId" placeholder="Treatment">
        </div>
        <div class="mb-3">
        <label for="locationId" class="form-label">Location</label>
        <input type="text" class="form-control" id="locationId" placeholder="Location">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addModalBtn">Add</button>
    </div>
    </div>
    </div>
';

echo($output);

?>