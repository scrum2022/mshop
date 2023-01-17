<?php
require_once 'vendor/autoload.php';
use Core\Core as Core;

/*Adding of Router */
$core = Core::getInstance();
$core->init();
$router = $core->getSystemObject();
$templater = $core->getSystemObject("template");

$router->FindPath();
$twig = $templater->getTwig();

//Удаление

$conn = mysqli_connect("localhost", "root", "root", "megashop");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM products";
if($result = mysqli_query($conn, $sql)){
    echo "<table><tr><th> Название &nbsp &nbsp</th><th> Стоимость </th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . "<br>". $row["name"] . "</td>";
            echo "<td>" . "<br>". $row["price"] . "</td>";
            echo "<td><form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);


echo "<br><br>";

//Редактирование

$conn = new mysqli("localhost", "root", "root", "megashop");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM products";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Название &nbsp &nbsp</th><th>Стоимость</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . "<br>". $row["name"] . "</td>";
            echo "<td>" . "<br>". $row["price"] . "</td>";
            echo "<td><a href='update.php?id=" . $row["id"] . "'><input type='submit' value='Редактирование'></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();

echo "<br><br>";


?>