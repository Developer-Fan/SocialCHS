<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>About Social CHS</title>
    <link rel = "stylesheet" type = "text/css" href = "main.css">
    <style>
      .main {
        padding: 20px;
      }
      .main h1 {
        font-size: 50px;
      }
      .main p, .main li {
        font-size: 20px;
      }
      .main h3{
        font-size: 30px;
      }
    </style>
  </head>
  <body>
    <div class = "menu">
      <a><img src = "https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1" alt = "CHS logo"></a>
      <a href = "./index.php">Home</a>
      <a id = "current-on">About</a>
      <a href = "./blog.php">Blog</a>
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
      <h1>Social CHS - About</h1>
      <p>Social CHS is an (unofficial) social site for CHS, built by CHS(<a href = "https://github.com/Developer-Fan">Developer Fan</a>).
        <br>
        The purpose of Social CHS is to provide free and efficient connection to others, to <b>every</b> CHS member.
        <hr style = "visibility: hidden; height: 10px">
      This version of Social CHS is BETA, released on .....
      </p>
    </div>
  </body>
</html>