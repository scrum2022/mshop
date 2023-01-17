<?php 
$conn = new mysqli("localhost", "root", "root", "megashop");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $userid = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM products WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $username = $row["name"];
                $price = $row["price"];
            }
            echo "<h3>Редактирование товаров</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$userid' />
                    <p>Название:
                    <input type='text' name='name' value='$username' /></p>
                    <p>Стоимость:
                    <input type='number' name='price' value='$price' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"])) {
      
    $userid = $conn->real_escape_string($_POST["id"]);
    $username = $conn->real_escape_string($_POST["name"]);
    $userage = $conn->real_escape_string($_POST["price"]);
    $sql = "UPDATE products SET name = '$username', price = '$price' WHERE id = '$userid'";
    if($result = $conn->query($sql)){
        header("Location: index.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();

?>