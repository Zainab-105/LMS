<?php

require_once './inc/sqlfunctions.php';

if(isset($_GET["id"])){
  $id = $_GET["id"];

  $book = select_where("books","id",$id,$connection,1);
  if(unlink("./img/" . $book["logo"])){
  delete_where_fun("books","id",$id,$connection);
  }

  header("location:books.php");
}

?>
