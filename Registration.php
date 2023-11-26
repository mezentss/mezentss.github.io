<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Регистрация</title>
  <link rel="stylesheet" href="slyles.css">
</head>
<body>
  <h1>Регистрация</h1>
  <form action="Registration.php" method="post">
    <input type="text" name="username" placeholder="Имя пользователя" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Зарегистрироваться</button>
    <br><br><br>
  </form>
<footer>
    <p>&copy; 2023 Магазин цветов. Мезенцева Софья, 221-361, Рубежный контроль №2</p>
  </footer>
  </body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "00000000";
$dbname = "webcontrol";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);

  if ($stmt->execute()) {
    header("Location: Main.php");
    exit();
  } else {
    echo "Ошибка регистрации: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();

session_start();
$_SESSION['username'] = $username;

?>

