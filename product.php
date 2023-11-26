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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Информация о продукте</title>
  <link rel="stylesheet" href="slyles.css">
  <script>
    function addToCart(productId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "addToCart.php?id=" + productId, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var quantityElement = document.getElementById('quantity');
        quantityElement.textContent = parseInt(quantityElement.textContent) - 1;
      } else {
      }
    }
  };
  xhr.send();
}

  </script>
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
    <?php
    if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

      $productId = $_GET['id']; 
      $sql = "SELECT * FROM flowers JOIN count ON flowers.id = count.id WHERE flowers.id = $productId";
      $productInfo = $conn->query($sql)->fetch(PDO::FETCH_ASSOC); 
      echo "<h2>" . $productInfo['description'] . "</h2>";
      echo "<p>Цена: " . $productInfo['price'] . "</p>";
      echo "<p>Характеристики: " . $productInfo['characteristics'] . "</p>";
      echo "<p>Количество в наличии: <span id='quantity'>" . $productInfo['quantity'] . "</span></p>";
      echo "<img src='" . $productInfo['photo'] . "'>";
      
      $sql = "UPDATE count SET quantity = quantity - 1 WHERE id = $productId";
      $conn->exec($sql);
    ?>
    <br>
    <button onclick="addToCart(<?php echo $productId; ?>)">Добавить в корзину</button>
  </main>
  <footer>
    <p>&copy; 2023 Магазин цветов. Мезенцева Софья, 221-361, Рубежный контроль №2</p>
  </footer>
</body>
</html>
