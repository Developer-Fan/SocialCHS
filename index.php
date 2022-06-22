<?php
  $conn = new SQLite3("./db.sqlite");
  $sql = "
    CREATE TABLE IF NOT EXISTS users(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      username TEXT NOT NULL,
      displayname TEXT NOT NULL,
      email TEXT NOT NULL,
      password TEXT NOT NULL,
      friends TEXT NOT NULL,
      fr TEXT NOT NULL,
      prof TEXT NOT NULL,
      status TEXT NOT NULL,
      badges TEXT NOT NULL,
      coins INTEGER NOT NULL
    );
    CREATE TABLE IF NOT EXISTS blog(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      author_id INTEGER NOT NULL,
      heading TEXT NOT NULL,
      body TEXT NOT NULL,
      likes TEXT NOT NULL
    );
    CREATE TABLE IF NOT EXISTS g_chat(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      msg TEXT NOT NULL,
      author_id INTEGER NOT NULL,
      date DATETIME CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS p_chat(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      fromUser INTEGER NOT NULL,
      toUser INTEGER NOT NULL,
      msg TEXT NOT NULL,
      date DATETIME CURRENT_TIMESTAMP
    );
  ";
  $conn -> exec($sql);
  $conn -> close();
  //Example usage of the session variables for this website
/*
  $_SESSION['louswchs'] = true;
  $_SESSION['uswchsu'] = "test";
*/
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CHS - Social</title>
    <style>
      .menu a {
        text-decoration: none;
        padding: 0 30px;
        color: black;
        vertical-align: middle;
        font-size: 20px;
      }
      #current-on{
        color: blue;
      }
      .menu img{
        height: 70px;
      }
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
      <a id = "current-on">Home</a>
      <a href = "./about.php">About</a>
      <a href = "./blog.php">Blog</a>
      <a href = "./chat.php">Chat</a>
      <a href = "./games.php">Games</a>
      <?php 
        if(!isset($_SESSION['louswchs'])){
          echo "<a href = './login.php'>Login</a>";
        }else{
          echo "<a href = './settings.php'>Settings</a><a style = 'font-size: 30px'><b>Welcome, ".$_SESSION[
            'uswchsu'
          ]."</a></b>";
        }
      ?>
    </div>
    <div class = "main">
      <h1>Socialising. With other CHS people. Made Easy.</h1>
      <p>
        Social CHS is an (unofficial) socialising website created by <a href = "https://github.com/Developer-Fan">Developer Fan</a>.
        <br>
        Although this page of Social CHS does not 
        look impressive, once you have 
        <a href = "./login.php">logged in or signed 
         up</a>, you'll be blowed by the numerous, 
        practical and unique features that it offers.
        <br>
        <ul>
          <li>Stay connected with the CHS community with Chat</li>
          <li>Free and easy blogging, for every CHS member</li>
          <li>Classic games made competetive</li>
          <li>Bragging rights with the digital currency, CHStonks coins</li>
          <li>Have fun (bullying) the bot <i>Totally a CHS student</i></li>
          <li>New features frequently</li>
        </ul>
      </p>
      <h3>So. What are you waiting for?</h3>
      <p><a href = "./login.php">Login or Sign Up NOW!!!</a></p>
    </div>
  </body>
</html>