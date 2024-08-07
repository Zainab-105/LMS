<?php

require_once './inc/sqlfunctions.php';

session_start();

if (!isset($_SESSION['loggedIn'])) {
  header("location:signin.php");
}

$books = select_where_string('books','status','Inactive',$connection,2);

?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/navbar.php' ?>
<?php require_once './inc/sidebar.php' ?>
<div class="content-wrapper">
  <!-- Main content -->
  <div class="col-12">
    <div class="container py-4">
    <form id="searchForm">
        <input type="text" name="search_query" id="searchQuery" class="form-control" placeholder="Search for books...">
      </form>
      <div class="">
        <div class="row col-12 m-0 p-2">
          <?php
            if(!empty($books)){
              foreach($books as $book){
                $book_id = $book["id"];
                $user_data = select_where("borrowedBooks","book_id",$book_id,$connection,1);
          ?>
          <div class="card p-2 m-2 col-sm-6 col-md-3">
              <h2 class="card-title"><?php echo $book['title']; ?></h2>
              <div class="card-body">
                <img src="./img/<?php echo $book['logo']; ?>" alt="Book Logo.." srcset="">
                <button class="btn btn-outline-danger d-block m-2" type="button">Borrowed</button><span> <?php echo ' Name = ' .  $user_data["username"] . '<br>' . 'Email = ' . $user_data["email"]; ?></span>

              </div>
              <div class="card-footer p-0">
                  <a href="returnedBooks.php?id=<?php echo $book["id"] ?>" class="btn btn-primary float-right mt-5">Mark as Available</a>
                </div>
          </div>
          <?php
              }
            }else{
              echo "<h1>No Books Available Here..!</h1>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
</div>

<?php require_once './inc/footer.php' ?>
