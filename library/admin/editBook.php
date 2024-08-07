<?php
require_once './inc/sqlfunctions.php';

session_start();

if (!isset($_SESSION['loggedIn'])) {
  header("location:signin.php");
}

if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

$books = select_where("books","id", $id, $connection, 1);

if (isset($_POST["submit"])) {


  if (!empty($_FILES["image"]["name"])) {
    unlink("./img/" . $books["logo"]);
    $newlogo = $_FILES["image"]["name"];
    $tmp_image = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tmp_image, './img/' . $newlogo);
    $insert_arr = array(
      "title" => $_POST["book"],
      "logo" => $newlogo,
      "status" => $_POST["status"],
    );
    $con_arr = array("id" => $id);
    update("books", $insert_arr, $con_arr, $connection);
  } else {
    $logo = $books["logo"];
    $insert_arr = array(
      "title" => $_POST["book"],
      "logo" => $logo,
      "status" => $_POST["status"],
    );
    $con_arr = array("id" => $id);
    update("books", $insert_arr, $con_arr, $connection);
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
          <h4 class="card-title w-100">Edit Book</h4>
          <div class="">
            <div class="form-group mt-5">
              <label for="exampleInputName1">Book Name</label>
              <input type="text" name="book" class="form-control" placeholder="Enter Game Name" value="<?php echo $books["title"] ?>" required>
            </div>
            <div class="form-group mt-5">
              <label for="exampleInputName1">Book Image</label>
              <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">Status</label>
              <select name="status" id="" class="w-100 p-2 border">
                <option value="<?php echo $books["status"] ?>" selected><?php echo $books["status"] ?></option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2 mt-4 mx-auto d-block w-50" name="submit">Update</button>
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
