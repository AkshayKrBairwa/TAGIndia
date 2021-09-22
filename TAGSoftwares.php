<?php
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "tagsoftwares";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}
if (isset($_GET['delete'])) {
    $p_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `tagproducts` WHERE `p_id` = $p_id";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['p_idEdit'])) {
        // Update the record
        $p_id = $_POST["p_idEdit"];
        $p_name = $_POST["p_nameEdit"];
        $p_price = $_POST["p_priceEdit"];
        $p_category = $_POST["p_categoryEdit"];
        $sql = "UPDATE `tagproducts` SET `p_name` = '$p_name' , `p_price` = '$p_price', `p_category` = '$p_category' WHERE `tagproducts`.`p_id` = $p_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "We could not update the record successfully";
        }
    } else {
        $p_name = $_POST["p_name"];
        $p_price = $_POST["p_price"];
        $p_category = $_POST["p_category"];
        // Sql query to be executed
        $sql = "INSERT INTO `tagproducts` (`p_name`, `p_price`,`p_category`,ts) VALUES ('$p_name', '$p_price','$p_category' ,current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-p_name" id="editModalLabel">Edit Product Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/PHP_TUTS/TAGSoftwares.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="p_idEdit" id="p_idEdit">
                        <div class="form-group">
                            <label for="p_name">Product Name</label>
                            <input type="text" class="form-control" id="p_nameEdit" name="p_nameEdit" aria-describedby="p_nameEdit">
                        </div>

                        <div class="form-group">
                            <label for="desc">Price</label>
                            <input class="form-control" id="p_priceEdit" name="p_priceEdit" />
                        </div>
                        <div class="form-group">
                            <label for="p_name">Product Category</label><br/>
                            <select id="p_categoryEdit" name="p_categoryEdit" class="form-control">
                                <option value="software">Software</option>
                                <option value="apps">Apps</option>
                                <option value="Pdf">Pdf</option>
                            </select>
                           <!-- <input type="text" class="form-control" id="p_categoryEdit" name="p_categoryEdit" aria-describedby="p_categoryEdit"> -->
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your product has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your product has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your product has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <div class="container my-4">
        <h2 style="text-align:center;">Add New Product</h2>
        <form action="/PHP_TUTS/TAGSoftwares.php" method="POST">
            <div class="form-group">
                <label for="p_name">PRODUCT NAME</label>
                <input type="text" class="form-control" id="p_name" name="p_name" aria-describedby="p_name" Required>
            </div>
            <div class="form-group">
                <label for="p_price">PRODUCT PRICE</label>
                <input type="number" class="form-control" id="p_price" name="p_price" aria-describedby="p-price" Required>
            </div>
            <div class="form-group">
                <label for="p_name">PRODUCT CATEGORY</label><br/>
                <select id="p_category" name="p_category" class="form-control">
                    <option value="" disabled="">Select Category</option>
                    <option value="software">Software</option>
                    <option value="apps">Apps</option>
                    <option value="Pdf">Pdf</option>
                </select>
                <!-- <input type="text" class="form-control" id="p_categoryEdit" name="p_categoryEdit" aria-describedby="p_categoryEdit"> -->
            </div>
            <!--<div class="form-group">
                <label for="p_name">CATEGORY</label>
                <input type="text" class="form-control" id="p_category" name="p_category" aria-describedby="Category">
            </div> -->
            <button type="submit" class="btn btn-primary">Add Product</button>
            
            <!--
                // categorywise search ajax handler 
            <div id="filter"class="form-group">
                <span>Show category wise &nbsp</span>
                <select id="p_filter" name="p_filter">
                    <option value="" disable="">Select Category</option>
                    <option value="software">Software</option>
                    <option value="apps">Apps</option>
                    <option value="Pdf">Pdf</option>
                </select>
              <input type="text" class="form-control" id="p_categoryEdit" name="p_categoryEdit" aria-describedby="p_categoryEdit">
            </div>
            <div class="container">
                <table class="table">

                <table>
                
            </div> -->
        </form>
    </div>
    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SNO</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT PRICE</th>
                    <th scope="col">PRODUCT CATEGORY</th>
                    <th scope="col">TIMESPAN</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `tagproducts`";
                $result = mysqli_query($conn, $sql);
                $p_id = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $p_id = $p_id + 1;
                    echo "<tr>
            <th scope='row'>" . $p_id . "</th>
            <td>" . $row['p_name'] . "</td>
            <td>" . $row['p_price'] . "</td>
            <td>" . $row['p_category'] . "</td>
            <td>" . $row['ts'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['p_id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['p_id'] . ">Delete</button>  </td>
          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                p_name = tr.getElementsByTagName("td")[0].innerText;
                p_price = tr.getElementsByTagName("td")[1].innerText;
                p_category = tr.getElementsByTagName("td")[2].innerText;
                //console.log(p_name, p_price,p_category);
                p_nameEdit.value = p_name;
                p_priceEdit.value = p_price;
                p_categoryEdit.value = p_category;
                p_idEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                p_id = e.target.id.substr(1);
                if (confirm("Are you sure you want to delete this Product!")) {
                    console.log("yes");
                    window.location = `/PHP_TUTS/TAGSoftwares.php?delete=${p_id}`;
    
                } else {
                    console.log("no");
                }
            })
        })
    </script>
   
</body>
</html>