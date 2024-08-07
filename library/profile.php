<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   header('location:login.php');
}
require_once './includes/sqlfunctions.php';

$email = $_SESSION["email"];

$user = select_where_string("registerdata","email",$email,$connection,1);

if(isset($_POST["submit"])){
    $update_arr = array(
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "password" => $_POST["password"],
);
$updat_con= array("email" => $email);
update("registerdata",$update_arr,$updat_con,$connection);
header("location:profile.php");
}

require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<div class="container shadow mt-5 p-5">
    
<form method="post" action="">
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" class="form-control" type="text" name="name" value="<?php echo $user["name"] ?>">
    </div>
    <div class="form-group">
        <input id="name" class="form-control" type="hidden" name="email" value="<?php echo $user["email"] ?>">
    </div>
    <div class="form-group">
        <label for="name">New Password</label>
        <input id="name" class="form-control" type="password" name="password">
    </div>
    <button type="submit" name="submit" class="btn btn-success">Update</button>
</form>

</div>



<?php
require_once  './includes/footer.php'
?>