<?php

require_once './inc/sqlfunctions.php';

if(isset($_GET["id"])){
  $id = $_GET["id"];
}

$delete = delete_where_fun("borrowedBooks","book_id",$id,$connection);

$update = "UPDATE books SET status = 'Active' WHERE id = $id;";
$query = mysqli_query($connection,$update);
header("location:borrowedBooks.php");

?>
