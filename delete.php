<?php
if(isset($_POST["id"]))
{
    $conn = mysqli_connect("localhost", "root", "root", "megashop");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM products WHERE id = '$userid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: index.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>