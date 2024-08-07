<?php
session_start();

require_once './includes/sqlfunctions.php';
if(isset($_SESSION['loggedin'])){
   header("location:index.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $res = mysqli_query($connection, "SELECT * FROM `registerdata` WHERE `email` = '$email' AND `password` = '$password'");
    if(mysqli_num_rows($res)>0){
        $_SESSION['loggedin'] = true;
        while($row = mysqli_fetch_assoc($res)){
         $data[] = $row;
         $data = array_shift($data);
     };
         $_SESSION["email"] = $data["email"];
        header("location:index.php");
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
				<p class="text-center text-uppercase mt-3">Login</p>
				<form class="form text-center" action="#" method="POST">
					<div class="form-group input-group-md">
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
					<div class="form-group input-group-md">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<button class="btn btn-lg btn-block btn-primary mt-4" name="submit" type="submit">
                        Login
               </button>
					<a href="forget.php" class="float-right mt-2">Forgot Password? </a>
				</form>
			</div>
			<a href="register.php" class="text-center d-block mt-2">Create an account? </a>
		</div>
	</div>
</div>

<?php
include_once './includes/footer.php';
?>