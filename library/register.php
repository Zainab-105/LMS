<?php

require_once './includes/sqlfunctions.php';

if (isset($_POST["submit"])) {
   $email = $_POST["email"];

   $email_check = select_where_string("registerdata", "email", $email, $connection, 1);

   if (!empty($email_check)) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Change your email!</strong> This email is already taken.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
   } else {
      $login_arr = array(
         "name" => $_POST["name"],
         "email" => $_POST["email"],
         "password" => $_POST["password"],
      );
         $sql = insert_func("registerdata", $login_arr, $connection);
         header("location:login.php");
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
				<p class="text-center text-uppercase mt-3">Register</p>
				<form class="form text-center" action="#" method="POST">
					<div class="form-group input-group-md">
						<input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
					</div>
					<div class="form-group input-group-md">
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
					<div class="form-group input-group-md">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<div class="form-group input-group-md">
						<input type="password" class="form-control" id="confirm-password" name="Confir_password" placeholder="Confirm Password">
					</div>
					<button class="btn btn-lg btn-block btn-primary mt-4" name="submit" type="submit">
                        Register
               </button>
				</form>
			</div>
			<a href="login.php" class="text-center d-block mt-2">already have an account?Login Now </a>
		</div>
	</div>
</div>

<?php
include_once './includes/footer.php';
?>