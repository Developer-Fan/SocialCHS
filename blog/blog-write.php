<?php
session_start();
$conn = new SQLite3("../db.sqlite");
if (!isset($_SESSION["louswchs"])) {
  header("Location: https://social-chs.coderct.repl.co/login.php");
  exit();
}
if (isset($_POST["title"]) && isset($_POST["body"]) && $_POST["title"] != "" && $_POST["body"] != "") {
  $title = htmlspecialchars($_POST["title"]);
  $body = htmlspecialchars($_POST["body"]);
  $sql = "INSERT INTO blog(author_id, heading, body, likes) VALUES(" . $_SESSION['idswchs'] . ", '$title', '$body', 0)";
  $conn->exec($sql);
  echo "Success!";
} else if (isset($_POST["submit"])) {
  echo "All fields below are required.";
}
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Write A Blog</title>
  <link rel="stylesheet" type="text/css" href="../main.css">
  <style>
    .main {
      padding: 20px;
    }

    input,
    textarea {
      display: block;
      margin-bottom: 10px;
    }

    textarea {
      max-height: 100px;
      max-width: 300px;
    }
  </style>
</head>

<body>
  <div class="menu">
    <a><img src="https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1" alt="CHS logo"></a>
    <a href="../index.php">Home</a>
    <a href="../about.php">About</a>
    <a href="../blog.php">Blog</a>
    <a href="../chat.php">Chat</a>
    <a href="../games.php">Games</a>
    <a href="../store.php">Store</a>
    <?php
    if (!isset($_SESSION["louswchs"])) {
      echo "<a href = '../login.php'>Login</a>";
    } else {
      echo "<a href = '../settings.php'>Settings</a><a style = 'font-size: 30px'>Welcome, <b>" . $_SESSION["dnswchs"] . "</a></b>";
    }
    ?>
  </div>
  <div class="main">
    <form action="../blog-write.php" method="post">
      <label for="title">Title</label>
      <input type="text" name="title">
      <textarea name="body">Write your blog here...</textarea>
      <input type="submit" name="submit">
    </form>
</body>

</html>