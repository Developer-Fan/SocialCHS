<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Title</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
  <div class="menu">
    <a><img src="https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1" alt="CHS logo"></a>
    <a id="current-on">Home</a>
    <a href="./about.php">About</a>
    <a href="./blog/blog.php">Blog</a>
    <a href="./chat.php">Chat</a>
    <a href="./games.php">Games</a>
    <a href="./store.php">Store</a>
    <?php
    if (!isset($_SESSION["louswchs"])) {
      echo "<a href = './login.php'>Login</a>";
    } else {
      echo "<a href = './settings.php'>Settings</a><a style = 'font-size: 30px'>Welcome, <b>" . $_SESSION["dnswchs"] . "</a></b>";
    }
    ?>
  </div>
</body>

</html>