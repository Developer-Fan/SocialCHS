<?php
  session_start();
  $conn = new SQLite3("./db.sqlite");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Blog</title>
    <link rel = "stylesheet" type = "text/css" href = "main.css">
    <style>
      .main {
        padding: 20px;
      }
      .main a {
        font-size: 50px;
        text-decoration: none;
      }
      .main a:hover{
        text-decoration: underline;
      }
      #nospecial{
        font-size: 20px !important;
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class = "menu">
      <a><img src = "https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1" alt = "CHS logo"></a>
      <a href = "./index.php">Home</a>
      <a href = "./about.php">About</a>
      <a id = "current-on">Blog</a>
      <a href = "./chat.php">Chat</a>
      <a href = "./games.php">Games</a>
      <a href = "./store.php">Store</a>
      <?php 
        if(!isset($_SESSION["louswchs"])){
          echo "<a href = './login.php'>Login</a>";
        }else{
          echo "<a href = './settings.php'>Settings</a><a style = 'font-size: 30px'>Welcome, <b>".$_SESSION[
            "dnswchs"
          ]."</a></b>";
        }
      ?>
    </div>
    <div class = "main">
      <?php
        if(isset($_SESSION["louswchs"])){
          echo "<a href = './blog-write.php' id = 'nospecial'>Write a blog article</a>";
        }else{
          echo "<a href = './login.php' id = 'nospecial'>Sign up or log in to write a blog article</a>";
        }
      ?>
      <hr style = "visibility: hidden">
      <form action = "./blog-search.php" method = "get">
        <input type = "text" placeholder = "Your search query..." name = "searchquery"><input type = "submit">
      </form>
      <?php 
        $sql = "SELECT * FROM blog ORDER BY id DESC LIMIT 5";
        $res = $conn->query($sql);
        while($r = $res->fetchArray(SQLITE3_ASSOC)){
          $t = $r["heading"];
          $id = $r["id"];
          echo "<br><a href = './blog-view.php?id=$id'>$t</a>";
        }
        $conn -> close();
      ?>
    </div>
  </body>
</html>