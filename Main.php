<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Магазин Цветов</title>
  <link rel="stylesheet" href="slyles.css">
  <script>
    var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg'];
    var currentImageIndex = 0;

    function updateImage() {
    var currentImage = document.querySelector('.currentImage');
    currentImage.src = images[currentImageIndex];

    var prevImage = document.querySelector('.prevImage');
    prevImage.style.backgroundImage = "url('" + images[currentImageIndex === 0 ? images.length - 1 : currentImageIndex - 1] + "')";

    var nextImage = document.querySelector('.nextImage');
    nextImage.style.backgroundImage = "url('" + images[currentImageIndex === images.length - 1 ? 0: currentImageIndex + 1] + "')";
}

    function nextImage() {
      if (currentImageIndex < images.length - 1) {
        currentImageIndex++;
      } else {
        currentImageIndex = 0; 
      }
      updateImage();
    }

    window.onload = updateImage; 
  </script>
</head>
<body>
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
    <h1>Добро пожаловать в магазин цветов</h1>
    <p>Здесь вы найдете самые красивые букеты цветов по доступным ценам.</p>
    <div id="imageContainer"></div>
    <div id="imageContainer">
  <div class="prevImage"></div>
  <img src="1.jpg" alt="Букет" class="currentImage">
  <div class="nextImage"></div>
</div>

    <button onclick="nextImage()">Следующий букет</button>
  </main>
  <footer>
    <p>&copy; 2023 Магазин цветов. Мезенцева Софья, 221-361, Рубежный контроль №2</p>
  </footer>
</body>
</html>
