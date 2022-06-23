<?php
  $conn = new SQLite3("./db.sqlite");
  if(isset($_POST["thet"]) && isset($_POST["pass"]) && $_POST["thet"] != "" && $_POST["pass"] != ""){
    $sql = "SELECT * FROM users WHERE email = '".$_POST['thet']."'";
  }else if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["displayname"]) && isset($_POST["password"]) && $_POST["email"] != "" && $_POST["username"] != "" && $_POST["displayname"] != "" && $_POST["password"] != ""){
    echo "test";
  }else if(isset($_POST["submit"])){
    echo "Please fill in the form(s) correctly!";
  }
  $conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login or Sign up to Social CHS</title>
    <style>
      input {
        display: block;
      }
    </style>
    <link rel = "stylesheet" type = "text/css" href = "main.css">
  </head>
  <body>
    <div class = "menu">
      <a><img src = "https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1" alt = "CHS logo"></a>
      <a href = "./index.php">Home</a>
      <a href = "./about.php">About</a>
      <a href = "./blog.php">Blog</a>
      <a href = "./chat.php">Chat</a>
      <a href = "./games.php">Games</a>
      <a href = "./store.php">Store</a>
      <a id = "current-on">Login</a>
    </div>
    <div class = "main">
      <button onclick = "change('login')">Login</button>
      <button onclick = "change('signup')">Signup</button>
      <div class = "login">
        <form action = "./login.php" method = "post">
          <input name = "thet" type = "text" placeholder = "Enter email or username">
          <input name = "pass" type = "password" placeholder = "Enter password">
          <input type = "submit" name = "submit">
        </form>
      </div>
      <span class = "signup">
        <form action = "./login.php" method = "post">
          <input name = "email" type = "email" placeholder = "Enter email">
          <input name = "username" type = "text" placeholder = "Enter unique username">
          <input name = "displayname" type = "text" placeholder = "Enter display name">
          <input name = "password" type = "password" placeholder = "Enter password">
          <input type = "submit" name = "submit">
        </form>
      </span>
    </div>
    <script>
      const elem1 = document.querySelector(".signup");
      const elem2 = document.querySelector(".login");
      elem1.style.display = "none";
      function change(thing){
        if(thing == "signup"){
          elem2.style.display = "none";
          elem1.style.display = "block";
        }else{
          elem1.style.display = "none";
          elem2.style.display = "block";
        }
      }
    </script>
  </body>
</html>