<?php

require_once './inc/sqlfunctions.php';

session_start();

if (!isset($_SESSION['loggedIn'])) {
  header("location:signin.php");
}

$user = select_all("registerdata",$connection);

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/navbar.php' ?>
<?php require_once './inc/sidebar.php' ?>
<div class="content-wrapper">
  <!-- Main content -->
  <div class="col-12">
    <div class="container py-4">
      <table class="table table-light">
        <thead class="thead-dark">
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($user)) {
            foreach ($user as $users) {
          ?>
          <tr>
            <td><?php echo $users["id"] ?></td>
            <td><?php echo $users["name"] ?></td>
            <td><?php echo $users["email"] ?></td>
            <td><a href="deleteUser.php?id=<?php echo $users["id"] ?>" class="btn btn-danger">Remove</a></td>
          </tr>
          <?php
            }
          } else {
            echo "<h1>No Member Available Here..!</h1>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.content -->
</div>

<?php require_once './inc/footer.php' ?>
