<?php
require_once './inc/sqlfunctions.php';

session_start();

if(!isset($_SESSION['loggedIn'])){
    header("location:signin.php");
}

if(isset($_POST["submit"])){
    $image = $_FILES["image"]["name"];
    $tmp_image = $_FILES["image"]["tmp_name"];
    $insert_arr = array(
        "title" => $_POST["book"],
        "logo" => $image,
        "status" => $_POST["status"],
    );
    if (move_uploaded_file($tmp_image, './img/' . $image)) {
      insert_func("books",$insert_arr,$connection);
  }

  header("location:books.php");

}

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/navbar.php' ?>
<?php require_once './inc/sidebar.php' ?>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="col-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body mt-5">
                    <h4 class="card-title w-100">Add New Book</h4>
                    <div class="">
                        <div class="form-group mt-5">
                            <label for="exampleInputName1">Book Name</label>
                            <input type="text" name="book" class="form-control" placeholder="Enter Game Name" required>
                        </div>
                        <div class="form-group mt-5">
                            <label for="exampleInputName1">Book Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Status</label>
                            <select name="status" id="" class="w-100 p-2 border">
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2 mt-4 mx-auto d-block w-50" name="submit">Add</button>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<!-- /.content -->
</div>

<?php require_once './inc/footer.php' ?>
