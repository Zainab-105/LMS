<?php

require_once './inc/sqlfunctions.php';

session_start();

if (!isset($_SESSION['loggedIn'])) {
  header("location:signin.php");
}

// Members

$members = "SELECT COUNT(*) AS members FROM registerdata";
$members_result = mysqli_query($connection, $members);

if (!$members_result) {
    die('Query error: ' . mysqli_error($connection));
}

$members_row = mysqli_fetch_assoc($members_result);
$total_members = $members_row['members'];

// all books

$all_books = "SELECT COUNT(*) AS total_books FROM books";
$all_books_result = mysqli_query($connection, $all_books);

if (!$all_books_result) {
    die('Query error: ' . mysqli_error($connection));
}

$all_books_row = mysqli_fetch_assoc($all_books_result);
$total_books = $all_books_row['total_books'];

// available books

$Active_books = "SELECT COUNT(*) AS total_books FROM books WHERE status = 'Active'";
$Active_books_result = mysqli_query($connection, $Active_books);

if (!$Active_books_result) {
    die('Query error: ' . mysqli_error($connection));
}

$Active_books_result_row = mysqli_fetch_assoc($Active_books_result);
$total_Active_books = $Active_books_result_row['total_books'];

// borrowed books

$borrowed_books = "SELECT COUNT(*) AS total_books FROM books WHERE status = 'Inactive'";
$borrowed_books_result = mysqli_query($connection, $borrowed_books);

if (!$borrowed_books_result) {
    die('Query error: ' . mysqli_error($connection));
}

$borrowed_books_result_row = mysqli_fetch_assoc($borrowed_books_result);
$total_borrowed_books = $borrowed_books_result_row['total_books'];
?>
<?php require_once './inc/header.php' ?>
<?php require_once './inc/navbar.php' ?>
<?php require_once './inc/sidebar.php' ?>
<div class="content-wrapper">
  <!-- Main content -->
  <div class="col-12">
    <div>
    <a href="addBooks.php" class="btn float-right btn-primary my-5"><i class="fa fa-plus-circle mr-2"></i> Add New Book</a>
    </div>
    <div class="container py-4">
      <div class="">
        <div class="row col-12 m-0 p-2">
          <div class="card p-2 m-2 col-sm-6 col-md-4">
            <a class="card-block stretched-link text-decoration-none text-dark" href="books.php">
              <h2 class="card-title">Total Books</h2>
              <div class="card-body">

                <h1 class="mt-4"><span class="mr-3"><?php echo $total_books ?></span><span><i class="fa fa-book"></i></span></h1>
              </div>
            </a>
          </div>
          <div class="card p-2 m-2 col-sm-6 col-md-4">
            <a class="card-block stretched-link text-decoration-none text-dark" href="availableBooks.php">
              <h2 class="card-title">Available Books</h2>
              <div class="card-body">

                <h1 class="mt-4"><span class="mr-3"><?php echo $total_Active_books ?></span><span><i class="fa fa-book"></i></span></h1>
              </div>
            </a>
          </div>
          <div class="card p-2 m-2 col-sm-6 col-md-4">
            <a class="card-block stretched-link text-decoration-none text-dark" href="borrowedBooks.php">
              <h2 class="card-title">Borrowed Books</h2>
              <div class="card-body">

                <h1 class="mt-4"><span class="mr-3"><?php echo $total_borrowed_books ?></span><span><i class="fa fa-book"></i></span></h1>
              </div>
            </a>
          </div>
          <div class="card p-2 m-2 col-sm-6 col-md-4">
            <a class="card-block stretched-link text-decoration-none text-dark" href="members.php">
              <h2 class="card-title">Total Members</h2>
              <div class="card-body">

                <h1 class="mt-4"><span class="mr-3"><?php echo $total_members; ?></span><span><i class="fa fa-user"></i></span></h1>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
</div>

<?php require_once './inc/footer.php' ?>
