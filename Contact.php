<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контакты</title>
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
    <h1>Наши контакты</h1>
    <p>Напишите нам по адресу flowershop@example.com или позвоните по номеру +123456789.</p>
  </main>
  <footer>
    <p>&copy; 2023 Магазин цветов. Мезенцева Софья, 221-361, Рубежный контроль №2</p>
  </footer>
</body>
</html>
