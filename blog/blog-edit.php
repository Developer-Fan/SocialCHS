<?php
session_start();
if (!isset($_SESSION["louswchs"])) {
    header("Location: ../login.php");
} else if (isset($_POST["content"]) && isset($_POST["heading"]) && $_POST["content"] != "" && $_POST["heading"] != "" && isset($_SESSION["editid"])) {
    $conn = new SQLite3("../db.sqlite");
    $sql = "UPDATE blog SET heading='" . htmlspecialchars($_POST["heading"]) . "', body = '" . htmlspecialchars($_POST["content"]) . "' WHERE id = " . $_SESSION["editid"] . ";";
    $res = $conn->exec($sql);
    if (!$res) {
        //echo $res->lastErrorMsg();
    }
    $conn->close();
    echo "success";
    $t = 2;
    $_GET["id"] = $_SESSION["editid"];
    unset($_SESSION["editid"]);
    header("Location: ./blog-view.php?id=" . $_GET["id"]);
    exit();
} else {
    $conn = new SQLite3("../db.sqlite");
    if (!isset($_GET["id"])) {
        header("Location: ./blog.php");
        exit();
    }
    $sql = "SELECT * FROM blog WHERE id = " . $_GET["id"] . ";";
    $res = $conn->query($sql);
    $t = 2;
    $i = 0;
    while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
        $i++;
        if ($row["author_id"] == $_SESSION["idswchs"]) {
            $t = 1;
        } else {
            $t = 0;
        }
    }
}
if (isset($_GET["id"])) {
    $_SESSION["editid"] = $_GET["id"];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit An Article</title>
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
        <a id="current-on">Blog</a>
        <a href="../chat.php">Chat</a>
        <a href="../games.php">Games</a>
        <a href="../store.php">Store</a>
        <?php
        if (!isset($_SESSION["louswchs"])) {
            echo "<a href = './login.php'>Login</a>";
        } else {
            echo "<a href = './settings.php'>Settings</a><a style = 'font-size: 30px'>Welcome, <b>" . $_SESSION["dnswchs"] . "</a></b>";
        }
        ?>
    </div>
    <div class="main">
        <?php
        if ($t == 0) {
            echo "<h1>You do not have permission to edit this article</h1>";
        } else if ($i == 0) {
            echo "<h1>Article not found</h1>";
        } else if ($t == 2) {
            echo "<p>View your updated blog <a href = './blog.php'>here</a></p>";
        } else {
            $sql = "SELECT * FROM blog WHERE id = " . $_GET["id"] . ";";
            $res = $conn->query($sql);
            while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                echo "<h1>Editing " . $row["heading"] . "</h1>";
                echo "<form action = 'blog-edit.php' method = 'post'>";
                echo "<input type = 'text' name = 'heading' value = '" . $row["heading"] . "'>";
                echo "<textarea name = 'content'>" . $row["body"] . "</textarea>";
                echo "<input type = 'submit' value = 'Submit'>";
                echo "</form>";
            }
        }

        ?>
    </div>
</body>

</html>