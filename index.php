<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />

    <style>
      #modal-container-c {
        width: 100%;
        height: 100vh;
        position: fixed;
        display: none;
        justify-content: center;
        background-color: rgba(189, 189, 189, 0.37);
        z-index: 1;
      }
    </style>
  </head>

  <body>
    <div id="modal-container-c"></div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD Demo</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <!-- <a class="nav-link" aria-current="page" href="#">Add</a> -->
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#addModal"
                id="add-item"
              >
                Add Item
              </button>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              id="search-bar"
            />
            <button
              class="btn btn-outline-success"
              type="submit"
              id="search-btn"
            >
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>

    <!-- code for container  -->

    <div
      class="container-fluid"
      id="item-container"
      style="
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        flex-wrap: wrap;
      "
    >
      <!-- <div class="card" style="width: 18rem;">
        <img src="img/aata.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Aashirvaad Shudh Chakki Whole Wheat Atta</p>
          <button type="button" class="btn btn-danger btn-sm">Delete</button>
          <button type="button" class="btn btn-primary btn-sm">Update</button>
        </div>
      </div> -->
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="addModal"
      tabindex="-1"
      aria-labelledby="addModalLabel"
      aria-hidden="true"
    >
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
    </div>

    <!-- bootstrap js cdn -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <!-- jquery js  -->
    <script src="javascript/jquery.js"></script>
    <!-- jquery ui js -->
    <script src="javascript/jquery-ui.min.js"></script>

    <script type="text/javascript">

      $(document).ready(function(){

        function loadData() {
          $.ajax({
            url: "api/loadData.php",
            type: "POST",
            data: {},
            success: function (data) {
              $("#item-container").html(data);
            }
          });
        }

        loadData();

        $(document).on("click", "#addModalBtn", function (e) {
          e.preventDefault();
          let name = $("#drNameId").val();
          let treatment = $("#treatmentId").val();
          let location = $("#locationId").val();
          console.log(name, treatment, location);

          if (name == "") {
            alert("please enter the name")
          }
          else if (treatment == "") {
            alert("please enter the treatment")
          }
          else if (location == "") {
            alert("please enter the location")
          }
          else {
            $.ajax({
              url: "api/insertData.php",
              type: "POST",
              data: { name: name, treatment: treatment, location: location },
              success: function (data) {
                if (data == 1) {
                  $("#drNameId").val("");
                  $("#treatmentId").val("");
                  $("#locationId").val("");
                  loadData();
                }
                else {
                  alert("can't insert data");
                  loadData();
                }
              }
            });

          }

        });

        //add
        // $(document).on("click", "#add-item", function(){
        //   $.ajax({
        //     url: "api/loadAddForm.php",
        //     type: "POST",
        //     data: {},
        //     success: function (data) {
        //       $("#addModal").html(data);
        //     }
        // })

        // delete card code
        $(document).on("click", ".delete-card", function () {
          var cardId = $(this).data("id");
          console.log(cardId);
          $.ajax({
            url: "api/deleteData.php",
            type: "POST",
            data: { id: cardId },
            success: function (data) {
              if (data == 1) {
                loadData();
              }
              else {
                alert("can't delete data");
                loadData();
              }
            }
          });
        })

        // update card code
        // $(document).on("click", ".update-card", function () {
        //   var cardId = $(this).data("id");
        //   console.log(cardId);
        //   $("#modal-container-c").show();
        //   $.ajax({
        //     url: "api/loadUpdateForm.php",
        //     type: "POST",
        //     data: { cid: cardId },
        //     success: function (data) {
        //       console.log(data);
        //       $("#modal-container-c").html(data);
        //     }
        //   });
        // })

        // code for search bar

        //on changes
        $(document).on("keyup", "#search-bar", function (e) {
          e.preventDefault();
          var searchText = $("#search-bar").val();
          console.log(searchText);
          $.ajax({
            url: "api/searchData.php",
            type: "POST",
            data: { text: searchText },
            success: function (data) {
              $("#item-container").html(data);
            }
          });
        })

        //on click on search
        $(document).on("click", "#search-btn", function (e) {
          e.preventDefault();
          var searchText = $("#search-bar").val();
          console.log(searchText);
          $.ajax({
            url: "api/searchData.php",
            type: "POST",
            data: { text: searchText },
            success: function (data) {
              $("#item-container").html(data);
            }
          });
        });

      });

    </script>
  </body>
</html>