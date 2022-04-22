<?php
require_once "config/db.php";
if(isset($_GET['id'])) {
    $query="DELETE FROM products WHERE id=".$_GET['id'];

    if (mysqli_query($link, $query)) {
        header("location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
    
    mysqli_close($link);
}
?>