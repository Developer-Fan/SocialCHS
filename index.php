<html>
  <head>
    <title>CHS - Social</title>
    <style>
      .menu a {
        text-decoration: none;
        padding: 0 30px;
        color: black;
        vertical-align: middle;
      }
      #current-on{
        color: blue;
      }
      .menu img{
        height: 70px;
      }
    </style>
  </head>
  <body>
    <div class = "menu">
      <a><img src = "https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1"></a>
      <a id = "current-on">Home</a>
      <a href = "./chat.php">Chat</a>
      <?php 
        if(!isset($_SESSION['louswchs'])){
          echo "<a href = './login.php'>Login</a>";
        }else{
          echo "<a>Welcome, ".$_SESSION[
            'uswchsu'
          ]."</a>";
        }
      ?>
    </div>
    <h1>Welcome to the unofficial social website of CHS</h1>
  </body>
</html>