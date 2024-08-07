<?php  

require_once './includes/sqlfunctions.php';

if(isset($_POST["submit"])){
    $update_arr = array(
    "email" => $_POST["email"],
    "password" => $_POST["password"],
);
$updat_con= array("email" => $_POST["email"]);
if(update("registerdata",$update_arr,$updat_con,$connection)){
header("location:login.php");
}else{
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Check Your Email and try again.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}
}

?>

<?php 
include_once './includes/header.php';
include_once './includes/loginnav.php';
?>

<div class="container mt-2">
	<div class="row justify-content-center align-items-center text-center p-2">
		<div class="m-1 col-sm-8 col-md-6 col-lg-4 shadow-sm p-3 mb-5 bg-white border rounded">
			<div class="pt-5 pb-5">
				<img class="rounded mx-auto d-block" src="https://freelogovector.net/wp-content/uploads/logo-images-13/microsoft-cortana-logo-vector-73233.png" alt="" width=70px height=70px>
				<p class="text-center text-uppercase mt-3">Forget Password</p>
				<form class="form text-center" action="#" method="POST">
					<div class="form-group input-group-md">
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
					<div class="form-group input-group-md">
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
					</div>
					<button class="btn btn-lg btn-block btn-primary mt-4" name="submit" type="submit">
                        Update
               </button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once './includes/footer.php';
?>