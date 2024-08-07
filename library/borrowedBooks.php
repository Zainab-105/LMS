<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   header('location:login.php');
}
require_once './includes/sqlfunctions.php';

$user_email = $_SESSION["email"];

$borrowedbooks = select_where_string('borrowedbooks', 'email', $user_email, $connection, 2);




require_once './includes/header.php';
require_once './includes/navbar.php';
?>

<div class="container shadow mt-5">
   <h1 class="text-center">Your Borrowed Books</h1>
   <div class="books row m-0 p-0">
      <?php
        if(!empty($borrowedbooks)){
         foreach ($borrowedbooks as $books) {
            $book_id = $books["book_id"];
            $book = select_where("books","id",$book_id,$connection,1);
      ?>
      <div class="card col-3">
         <div class="card-body">
            <h5 class="card-title"><?php echo $book["title"] ?></h5>
            <img src="./admin/img/<?php echo $book["logo"] ?>" class="d-block" alt="" srcset="">
         </div>
         <div class="card-footer">
            <button class="btn btn-outline-danger" type="button"><?php 
            if($book["status"] == 'Inactive'){
                echo "Borrowed";
            } ?>
            </button>
         </div>
      </div>
      <?php
       }
    }else{
        echo "<h3 class='text-center'>No Books Here</h3>";
    }
      ?>
   </div>
   
</div>



<?php
require_once  './includes/footer.php'
?>