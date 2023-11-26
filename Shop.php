<?php
session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "00000000";
$dbname = "webcontrol";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die(":(");
}

$sql = "SELECT id, description, photo, price FROM flowers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Магазин</title>
  <link rel="stylesheet" href="slyles.css">
</head>
<body>
  <header>
  <nav>
      <ul>
        <li><a href="Main.php">Главная</a></li>
        <li><a href="Shop.php">Магазин</a></li>
        <li><a href="Contact.php">Контакты</a></li>
        <?php
          if(isset($_SESSION['username'])) {
            echo "<li><a href='Cart.php'>Корзина</a></li>";
            echo "<li style='display: none;'><a href='Registration.php'>Регистрация</a></li>";
            echo "<li style='display: none;'><a href='Login.php'>Вход</a></li>";
          } else {
            echo "<li><a href='Registration.php'>Регистрация</a></li>";
            echo "<li><a href='Login.php'>Вход</a></li>";
          }
          ?>
      </ul>
    </nav>
  </header>
  <main>
  <h1>Наша продукция</h1>
  <table>
    <tr>
      <th>Описание</th>
      <th>Фото</th>
      <th>Цена</th>
    </tr>
    <?php
      foreach($result as $row) {
        echo "<tr>";
        echo "<td class = 'description'>" . $row['description'] . "</td>";
        echo "<td class = 'photo'><img src='" . $row['photo'] . "'></td>";
        echo "<td class = 'price'>" . $row['price'] . "</td>";
        echo "<td class = 'link'><a href='product.php?id=" . $row['id'] . "'>Подробнее</a></td>";
        echo "</tr>";
      }
    ?>
  </table>
</main>
<footer>
    <p>&copy; 2023 Магазин цветов. Мезенцева Софья, 221-361, Рубежный контроль №2</p>
  </footer>
</body>
</html>

