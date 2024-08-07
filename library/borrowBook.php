<?php 

require_once './includes/sqlfunctions.php';

if(isset($_GET["id"])){
    $book_id = $_GET["id"];
    $user_email = $_GET["user"];

    $book = select_where("books","id",$book_id,$connection,1);
    $user = select_where_string("registerdata","email",$user_email,$connection,1);

    $insert_arr = array(
        "username" => $user["name"],
        "email" => $user["email"],
        "book_id" => $book_id,
    );
    insert_func("borrowedBooks",$insert_arr,$connection);

    $update = "UPDATE books SET status = 'Inactive' WHERE id = $book_id;";
    $query = mysqli_query($connection,$update);
    header("location:borrowedBooks.php");
}
