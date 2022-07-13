<?php
session_start();
$conn = new SQLite3("../db.sqlite");
if (!isset($_GET["searchquery"])) {
    header("Location: ./blog.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>View an article - Social CHS</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
    <style>
        .main {
            padding: 20px;
        }

        .main h1 {
            font-size: 50px;
        }

        .main p,
        .main li {
            font-size: 20px;
        }

        .main h3 {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="menu">
        <a><img src="https://th.bing.com/th/id/OIP.WtHJMFPvbx62FKV5ozTEwwAAAA?pid=ImgDet&rs=1" alt="CHS logo"></a>
        <a href="../index.php">Home</a>
        <a href="../about.php">About</a>
        <a id="current-on">Blog</a>
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
        <?php
        $sql = "SELECT * FROM blog WHERE id = " . $_GET["id"] . ";";
        $res = $conn->query($sql);
        $t = 0;
        while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
            echo "<h1>" . $row["heading"] . "</h1>";
            if ($row["author_id"] == $_SESSION["idswchs"]) {
                echo "<a href = 'blog-edit.php?id=" . $row["id"] . "'>Edit</a>";
            }
            echo "<p>" . $row["body"] . "</p>";
            $t++;
        }
        if ($t < 1) {
            echo "No article exists.";
        }
        $conn->close();
        ?>
</body>

</html>