<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   header('location:login.php');
}
require_once './includes/sqlfunctions.php';
$books = select_where_string('books', 'status', 'Active', $connection, 2);




require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<div class="bg-image"></div>

<div class="container shadow mt-5">
   <h1 class="text-center">UOS Library</h1>
   <div class="books row m-0 p-0">
      <?php
      foreach ($books as $book) {
      ?>
         <div class="card col-3">
            <div class="card-body">
               <h5 class="card-title"><?php echo $book["title"] ?></h5>
               <img src="./admin/img/<?php echo $book["logo"] ?>" class="d-block" alt="" srcset="">
            </div>
            <div class="card-footer">
               <a href="borrowBook.php?id=<?php echo $book["id"] ?>&user=<?php echo $_SESSION["email"]; ?>" class="btn btn-primary w-100">Borrow</a>
            </div>
         </div>
      <?php } ?>
   </div>

</div>



<?php
require_once  './includes/footer.php'
?>