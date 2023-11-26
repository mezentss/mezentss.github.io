<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="slyles.css">
  <title>Корзина</title>
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
  <h2>Корзина</h2>
  <?php
if(!empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $product) {
        echo "Название товара: " . $product['name'] . "<br>";
        echo "Цена товара: " . $product['price'] . "<br>";
        echo "<hr>";
    }

    $totalPrice = 0;
    $totalQuantity = 0;
    foreach($_SESSION['cart'] as $product) {
        $totalPrice += $product['price'];
        $totalQuantity++;
    }
    
    echo "Общая стоимость товаров: " . $totalPrice . "<br>";
    echo "Общее количество товаров: " . $totalQuantity . "<br>";
} else {
    echo "Корзина пуста";
}
?>

  <footer>
    <p>&copy; 2023 Магазин цветов. Мезенцева Софья, 221-361, Рубежный контроль №2</p>
  </footer>
</body>
</html>
